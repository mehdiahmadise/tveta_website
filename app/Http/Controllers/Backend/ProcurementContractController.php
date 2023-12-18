<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProcurementContractCreateRequest;
use App\Http\Requests\AdminProcurementContractUpdateRequest;
use App\Models\Language;
use App\Models\ProcurementContract;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class ProcurementContractController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.procurement_contract.all', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.procurement_contract.create', compact('languages'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminProcurementContractCreateRequest $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $procurement_contract = new ProcurementContract();
        $procurement_contract->language = $request->language;
        $procurement_contract->image = $imagePath;
        $procurement_contract->file = $filePath;
        $procurement_contract->subject = $request->subject;
        $procurement_contract->date_gregorian = $request->date_gregorian;
        $procurement_contract->date_ghamari = $request->date_ghamari;
        $procurement_contract->date_shamsi = $request->date_shamsi;
        $procurement_contract->content = $request->content;
        $procurement_contract->meta_title = $request->meta_title;
        $procurement_contract->meta_description = $request->meta_description;
        $procurement_contract->status = $request->status == 1 ? 1 : 0;
        $procurement_contract->save();

        toast('دستاورد مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.procurement-contracts.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleAgreementStatus(Request $request)
    {
        try {
            $procurement_contract = ProcurementContract::findOrFail($request->id);
            $procurement_contract->{$request->name} = $request->status;
            $procurement_contract->save();

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
        $procurement_contract = ProcurementContract::findOrFail($id);
        return view('backend.modules.procurement_contract.edit', compact('languages', 'procurement_contract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminProcurementContractUpdateRequest $request, string $id)
    {
        $procurement_contract = ProcurementContract::findOrFail($id);
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');
        $procurement_contract->language = $request->language;
        $procurement_contract->image = !empty($imagePath) ? $imagePath : $procurement_contract->image;
        $procurement_contract->file = !empty($filePath) ? $filePath : $procurement_contract->file;
        $procurement_contract->subject = $request->subject;
        $procurement_contract->date_gregorian = $request->date_gregorian;
        $procurement_contract->date_ghamari = $request->date_ghamari;
        $procurement_contract->date_shamsi = $request->date_shamsi;
        $procurement_contract->content = $request->content;
        $procurement_contract->meta_title = $request->meta_title;
        $procurement_contract->meta_description = $request->meta_description;
        $procurement_contract->status = $request->status == 1 ? 1 : 0;
        $procurement_contract->update();
        
        toast('دستاورد مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.procurement-contracts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $procurement_contract = ProcurementContract::findOrFail($id);
        $this->deleteFile($procurement_contract->image);
        $this->deleteFile($procurement_contract->file);
        $procurement_contract->delete();
        return response(['status' => 'success', 'message' => 'دستاورد مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copyProcurementContract(string $id)
    {
        $procurement_contract = ProcurementContract::findOrFail($id);
        $copyImportantActivity = $procurement_contract->replicate();
        $copyImportantActivity->save();
        toast('دستاورد مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }

    /**
     * change toggle status of important activity
     */
    public function toggleProcurementContractStatus(Request $request)
    {
        try {
            $procurement_contract = ProcurementContract::findOrFail($request->id);
            $procurement_contract->{$request->name} = $request->status;
            $procurement_contract->save();

            return response(['status' => 'success', 'message' => 'تغییرات با موفقیت ثبت شد.']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
