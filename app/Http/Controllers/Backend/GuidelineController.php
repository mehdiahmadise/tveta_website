<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminGuideLineCreateRequest;
use App\Http\Requests\AdminGuideLineUpdateRequest;
use App\Models\Guideline;
use App\Models\Language;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class GuidelineController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.guideline.all', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.guideline.create', compact('languages'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminGuideLineCreateRequest $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $guideline = new Guideline();
        $guideline->language = $request->language;
        $guideline->image = $imagePath;
        $guideline->file = $filePath;
        $guideline->subject = $request->subject;
        $guideline->content = $request->content;
        $guideline->meta_title = $request->meta_title;
        $guideline->meta_description = $request->meta_description;
        $guideline->status = $request->status == 1 ? 1 : 0;
        $guideline->save();

        toast('رهنمود مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.guidelines.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleGuidelineStatus(Request $request)
    {
        try {
            $guideline = Guideline::findOrFail($request->id);
            $guideline->{$request->name} = $request->status;
            $guideline->save();

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
        $guideline = Guideline::findOrFail($id);
        return view('backend.modules.guideline.edit', compact('languages', 'guideline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminGuideLineUpdateRequest $request, string $id)
    {
        $guideline = Guideline::findOrFail($id);
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $guideline->language = $request->language;
        $guideline->image = !empty($imagePath) ? $imagePath : $guideline->image;
        $guideline->file = !empty($filePath) ? $filePath : $guideline->file;
        $guideline->subject = $request->subject;
        $guideline->content = $request->content;
        $guideline->meta_title = $request->meta_title;
        $guideline->meta_description = $request->meta_description;
        $guideline->status = $request->status == 1 ? 1 : 0;
        $guideline->update();
        
        toast('رهنمود مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.guidelines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guideline = Guideline::findOrFail($id);
        $this->deleteFile($guideline->image);
        $this->deleteFile($guideline->file);
        $guideline->delete();

        return response(['status' => 'success', 'message' => 'رهنمود مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copyGuideline(string $id)
    {
        $guideline = Guideline::findOrFail($id);
        $copyImportantActivity = $guideline->replicate();
        $copyImportantActivity->save();

        toast('رهنمود مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }
}
