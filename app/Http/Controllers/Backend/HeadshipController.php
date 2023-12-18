<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminHeadshipCreateRequest;
use App\Http\Requests\AdminHeadshipUpdateRequest;
use App\Models\Headship;
use App\Models\Language;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class HeadshipController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.headship.all', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.headship.create', compact('languages'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminHeadshipCreateRequest $request)
    {

        $filePath = $this->handleFileUpload($request, 'file');

        $headship = new Headship();
        $headship->language = $request->language;
        $headship->file = $filePath;

        $headship->title = $request->title;
        $headship->content = $request->content;
        $headship->meta_title = $request->meta_title;
        $headship->meta_description = $request->meta_description;
        $headship->status = $request->status == 1 ? 1 : 0;
        $headship->save();

        toast('فورم عرضه خدمات مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.headships.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleAgreementStatus(Request $request)
    {
        try {
            $headship = Headship::findOrFail($request->id);
            $headship->{$request->name} = $request->status;
            $headship->save();

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
        $headship = Headship::findOrFail($id);
        return view('backend.modules.headship.edit', compact('languages', 'headship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminHeadshipUpdateRequest $request, string $id)
    {
        $headship = Headship::findOrFail($id);
        $filePath = $this->handleFileUpload($request, 'file');

        $headship->language = $request->language;
        $headship->file = !empty($filePath) ? $filePath : $headship->file;
        $headship->title = $request->title;
        $headship->content = $request->content;
        $headship->meta_title = $request->meta_title;
        $headship->meta_description = $request->meta_description;
        $headship->status = $request->status == 1 ? 1 : 0;
        $headship->update();
        
        toast('فورم عرضه خدمات مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.headships.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $headship = Headship::findOrFail($id);
        $this->deleteFile($headship->image);
        $this->deleteFile($headship->file);
        $headship->delete();
        return response(['status' => 'success', 'message' => 'فورم عرضه خدمات مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copyAchievement(string $id)
    {
        $headship = Headship::findOrFail($id);
        $copyHeadship = $headship->replicate();
        $copyHeadship->save();
        toast('فورم عرضه خدمات مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }

    /**
     * change toggle status of important activity
     */
    public function toggleAchievementStatus(Request $request)
    {
        try {
            $headship = Headship::findOrFail($request->id);
            $headship->{$request->name} = $request->status;
            $headship->save();

            return response(['status' => 'success', 'message' => 'تغییرات با موفقیت ثبت شد.']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
