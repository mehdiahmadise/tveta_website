<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminArticleCreateRequest;
use App\Http\Requests\AdminArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\CenterType;
use App\Models\District;
use App\Models\Language;
use App\Models\Province;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.article.all', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        $center_types = CenterType::all();
        return view('backend.modules.article.create', compact('languages', 'center_types'));
    }

    /**
     * Fetch category depending on language
     */
    public function fetchProvince(Request $request)
    {
        $provinces = Province::where('language', $request->lang)->get();
        return $provinces;
    }
    /**
     * Fetch category depending on language
     */
    public function fetchDistrict(Request $request)
    {
        $districts = District::where('province_id', $request->province)->get();
        return $districts;
    }

    public function fetchCategory(Request $request)
    {
        $categories = Category::where('language', $request->lang)->get();
        return $categories;
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminArticleCreateRequest   $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $article = new Article();
        $article->language = $request->language;
        $article->category_id = $request->category;
        $article->province_id = $request->province;
        $article->district_id = $request->district;
        $article->center_type_id = $request->center_type;
        $article->image = $imagePath;
        $article->file = $filePath;
        $article->title = $request->title;
        $article->author = $request->author;
        $article->date_gregorian = $request->date_gregorian;
        $article->date_ghamari = $request->date_ghamari;
        $article->date_shamsi = $request->date_shamsi;
        $article->content = $request->content;
        $article->meta_title = $request->meta_title;
        $article->meta_description = $request->meta_description;
        $article->status = $request->status == 1 ? 1 : 0;
        $article->save();

        toast('مقاله مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.article.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleArticleStatus(Request $request)
    {
        try {
            $article = Article::findOrFail($request->id);
            $article->{$request->name} = $request->status;
            $article->save();

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
        $article = Article::findOrFail($id);
        $provinces = Province::where('language', $article->language)->get();
        $districts = District::where('language', $article->language)->get();
        $categories = Category::where('language', $article->language)->get();
        $center_types = CenterType::all();
        return view('backend.modules.article.edit', compact('languages', 'article', 'provinces','districts', 'center_types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminArticleUpdateRequest $request, string $id)
    {
        $article = Article::findOrFail($id);
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $article->language = $request->language;
        $article->category_id = $request->category;
        $article->province_id = $request->province;
        $article->district_id = $request->district;
        $article->center_type_id = $request->center_type;
        $article->image = !empty($imagePath) ? $imagePath : $article->image;
        $article->file = !empty($filePath) ? $filePath : $article->file;
        $article->title = $request->title;
        $article->author = $request->author;
        $article->date_gregorian = $request->date_gregorian;
        $article->date_ghamari = $request->date_ghamari;
        $article->date_shamsi = $request->date_shamsi;
        $article->content = $request->content;
        $article->meta_title = $request->meta_title;
        $article->meta_description = $request->meta_description;
        $article->status = $request->status == 1 ? 1 : 0;
        $article->save();
        
        toast('مقاله مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $this->deleteFile($article->image);
        $article->delete();

        return response(['status' => 'success', 'message' => 'مقاله مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copyArticle(string $id)
    {
        $article = Article::findOrFail($id);
        $copyImportantActivity = $article->replicate();
        $copyImportantActivity->save();

        toast('مقاله مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }



    function approveArticle(Request $request): Response
    {
        $article = Article::findOrFail($request->id);
        $article->is_approved = $request->is_approve;
        $article->save();
        return response(['status' => 'success', 'message' => 'مقاله مورد نظر تایید شد.']);
    }
}
