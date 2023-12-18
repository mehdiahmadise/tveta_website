<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsCreateRequest;
use App\Http\Requests\AdminNewsUpdateRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use App\Models\Tag;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.news.all', compact('languages'));
    }

    public function pendingNews(): View
    {
        $languages = Language::all();
        return view('admin.pending-news.index', compact('languages'));
    }


    /**
     * Fetch category depending on language
     */
    public function fetchCategory(Request $request)
    {
        $categories = Category::where('language', $request->lang)->get();
        return $categories;
    }

    function approveNews(Request $request): Response
    {
        $news = News::findOrFail($request->id);
        $news->is_approved = $request->is_approve;
        $news->save();

        return response(['status' => 'success', 'message' => 'خبر مورد نظر تایید شد.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.news.create', compact('languages'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminNewsCreateRequest $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $news = new News();
        $news->language = $request->language;
        $news->category_id = $request->category;
        $news->auther_id = Auth::guard('admin')->user()->id;
        $news->image = $imagePath;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;
        $news->save();

        $tags = explode(',', $request->tags);
        $tagIds = [];

        foreach ($tags as $tag) {
            $item = new Tag();
            $item->name = $tag;
            $item->language = $news->language;
            $item->save();

            $tagIds[] = $item->id;
        }

        $news->tags()->attach($tagIds);

        toast('خبر مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.news.index');
    }

    /**
     * change toggle status of news
     */
    public function toggleNewsStatus(Request $request)
    {
        try {
            $news = News::findOrFail($request->id);
            $news->{$request->name} = $request->status;
            $news->save();

            return response(['status' => 'success', 'message' => 'تغییرات با موفقیت ثبت شد.']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $news = News::findOrFail($id);
        $categories = Category::where('language', $news->language)->get();
        return view('backend.modules.news.edit', compact('languages', 'news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminNewsUpdateRequest $request, string $id)
    {
        $news = News::findOrFail($id);

        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $news->language = $request->language;
        $news->category_id = $request->category;
        $news->image = !empty($imagePath) ? $imagePath : $news->image;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;
        $news->save();

        $tags = explode(',', $request->tags);
        $tagIds = [];

        /** Delete previos tags */
        $news->tags()->delete();

        /** detach tags form pivot table */
        $news->tags()->detach($news->tags);

        foreach ($tags as $tag) {
            $item = new Tag();
            $item->name = $tag;
            $item->language = $news->language;
            $item->save();

            $tagIds[] = $item->id;
        }

        $news->tags()->attach($tagIds);


        toast('اخبار مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $this->deleteFile($news->image);
        $news->tags()->delete();
        $news->delete();

        return response(['status' => 'success', 'message' => 'خبر مورد نظر با موفقیت انجام شد']);
    }

    /**
     * Copy news
     */
    public function copyNews(string $id)
    {
        $news = News::findOrFail($id);
        $copyNews = $news->replicate();
        $copyNews->save();

        toast('خبر مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }
}
