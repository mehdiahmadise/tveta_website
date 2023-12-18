<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminHeadshipCreateRequest;
use App\Http\Requests\AdminHeadshipFormCreateRequest;
use App\Http\Requests\AdminHeadshipFormUpdateRequest;
use App\Http\Requests\AdminHeadshipUpdateRequest;
use App\Models\Headship;
use App\Models\HeadshipForm;
use App\Models\Language;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class HeadshipFormController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.headship-form.all', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        $headships = Headship::all();
        return view('backend.modules.headship-form.create', compact('languages', 'headships'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminHeadshipFormCreateRequest $request)
    {
        $filePath = $this->handleFileUpload($request, 'file');

        $headship_form = new HeadshipForm();
        $headship_form->language = $request->language;
        
        $headship_form->file = $filePath;
        $headship_form->title = $request->title;
        $headship_form->headship_id = $request->headship_id;
        $headship_form->content = $request->content;
        $headship_form->meta_title = $request->meta_title;
        $headship_form->meta_description = $request->meta_description;
        $headship_form->status = $request->status == 1 ? 1 : 0;
        $headship_form->save();

        toast('فایل عرضه خدمات مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.headship-forms.index');
    }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $headship_form = HeadshipForm::findOrFail($id);
        $headships = Headship::all();
        return view('backend.modules.headship-form.edit', compact('languages', 'headship_form', 'headships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminHeadshipFormUpdateRequest $request, string $id)
    {
        $headship_form = HeadshipForm::findOrFail($id);
        $filePath = $this->handleFileUpload($request, 'file');

        $headship_form->language = $request->language;
        $headship_form->file = !empty($filePath) ? $filePath : $headship_form->file;
        $headship_form->title = $request->title;
        $headship_form->headship_id = $request->headship_id;
        $headship_form->content = $request->content;
        $headship_form->meta_title = $request->meta_title;
        $headship_form->meta_description = $request->meta_description;
        $headship_form->status = $request->status == 1 ? 1 : 0;
        $headship_form->save();
        
        toast('فایل عرضه خدمات مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.headship-forms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $headship_form = HeadshipForm::findOrFail($id);
        $this->deleteFile($headship_form->file);
        $headship_form->delete();

        return response(['status' => 'success', 'message' => 'فایل عرضه خدمات مورد نظر با موفقیت حذف شد']);
    }

       /**
     * change toggle status of important activity
     */
    public function toggleHeadshipFormStatus(Request $request)
    {
        try {
            $headship_form = HeadshipForm::findOrFail($request->id);
            $headship_form->{$request->name} = $request->status;
            $headship_form->save();

            return response(['status' => 'success', 'message' => 'تغییرات با موفقیت ثبت شد.']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Copy important activity
     */
    public function copyHeadshipForm(string $id)
    {
        $headship_form = HeadshipForm::findOrFail($id);
        $copyHeadshipForm = $headship_form->replicate();
        $copyHeadshipForm->save();

        toast('فایل عرضه خدمات مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }
}
