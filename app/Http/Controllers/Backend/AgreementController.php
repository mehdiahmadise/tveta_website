<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAgreementCreateRequest;
use App\Http\Requests\AdminAgreementUpdateRequest;
use App\Models\Agreement;
use App\Models\Language;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.agreement.all', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.agreement.create', compact('languages'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminAgreementCreateRequest $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $agreement = new Agreement();
        $agreement->language = $request->language;
        $agreement->image = $imagePath;
        $agreement->file = $filePath;
        $agreement->subject = $request->subject;
        $agreement->date_gregorian = $request->date_gregorian;
        $agreement->date_ghamari = $request->date_ghamari;
        $agreement->date_shamsi = $request->date_shamsi;
        $agreement->content = $request->content;
        $agreement->meta_title = $request->meta_title;
        $agreement->meta_description = $request->meta_description;
        $agreement->status = $request->status == 1 ? 1 : 0;
        $agreement->save();

        toast('تفاهم نامه مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.agreement.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleAgreementStatus(Request $request)
    {
        try {
            $agreement = Agreement::findOrFail($request->id);
            $agreement->{$request->name} = $request->status;
            $agreement->save();

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
        $agreement = Agreement::findOrFail($id);
        return view('backend.modules.agreement.edit', compact('languages', 'agreement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminAgreementUpdateRequest $request, string $id)
    {
        $agreement = Agreement::findOrFail($id);
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $agreement->language = $request->language;
        $agreement->image = !empty($imagePath) ? $imagePath : $agreement->image;
        $agreement->file = !empty($filePath) ? $filePath : $agreement->file;
        $agreement->subject = $request->subject;
        $agreement->date_gregorian = $request->date_gregorian;
        $agreement->date_ghamari = $request->date_ghamari;
        $agreement->date_shamsi = $request->date_shamsi;
        $agreement->content = $request->content;
        $agreement->meta_title = $request->meta_title;
        $agreement->meta_description = $request->meta_description;
        $agreement->status = $request->status == 1 ? 1 : 0;
        $agreement->save();
        
        toast('تفاهم نامه مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.agreement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agreement = Agreement::findOrFail($id);
        $this->deleteFile($agreement->image);
        $this->deleteFile($agreement->file);
        $agreement->delete();

        return response(['status' => 'success', 'message' => 'تفاهم نامه مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copyAgreement(string $id)
    {
        $agreement = Agreement::findOrFail($id);
        $copyImportantActivity = $agreement->replicate();
        $copyImportantActivity->save();

        toast('تفاهم نامه مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }
}
