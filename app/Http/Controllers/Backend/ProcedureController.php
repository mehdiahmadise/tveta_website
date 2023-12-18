<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProcedureCreateRequest;
use App\Http\Requests\AdminProcedureUpdateRequest;
use App\Http\Requests\AdminProfileUpdateRequest;
use App\Models\Language;
use App\Models\Procedure;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.procedure.all', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.procedure.create', compact('languages'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminProcedureCreateRequest $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $procedure = new Procedure();
        $procedure->language = $request->language;
        $procedure->image = $imagePath;
        $procedure->file = $filePath;
        $procedure->subject = $request->subject;
        $procedure->content = $request->content;
        $procedure->meta_title = $request->meta_title;
        $procedure->meta_description = $request->meta_description;
        $procedure->status = $request->status == 1 ? 1 : 0;
        $procedure->save();

        toast('طرزالعمل مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.procedures.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleProcedureStatus(Request $request)
    {
        try {
            $procedure = Procedure::findOrFail($request->id);
            $procedure->{$request->name} = $request->status;
            $procedure->save();

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
        $procedure = Procedure::findOrFail($id);
        return view('backend.modules.procedure.edit', compact('languages', 'procedure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminProcedureUpdateRequest $request, string $id)
    {
        $procedure = Procedure::findOrFail($id);
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $procedure->language = $request->language;
        $procedure->image = !empty($imagePath) ? $imagePath : $procedure->image;
        $procedure->file = !empty($filePath) ? $filePath : $procedure->file;
        $procedure->subject = $request->subject;
        $procedure->content = $request->content;
        $procedure->meta_title = $request->meta_title;
        $procedure->meta_description = $request->meta_description;
        $procedure->status = $request->status == 1 ? 1 : 0;
        $procedure->update();
        
        toast('طرزالعمل مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.procedures.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $procedure = Procedure::findOrFail($id);
        $this->deleteFile($procedure->image);
        $this->deleteFile($procedure->file);
        $procedure->delete();

        return response(['status' => 'success', 'message' => 'طرزالعمل مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copyProcedure(string $id)
    {
        $procedure = Procedure::findOrFail($id);
        $copyImportantActivity = $procedure->replicate();
        $copyImportantActivity->save();

        toast('طرزالعمل مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }
}
