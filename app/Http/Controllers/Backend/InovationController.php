<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminInovationCreateRequest;
use App\Http\Requests\AdminInovationUpdateRequest;
use App\Models\CenterType;
use App\Models\District;
use App\Models\Inovation;
use App\Models\Language;
use App\Models\Province;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InovationController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.inovation.all', compact('languages'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        $center_types = CenterType::all();
        return view('backend.modules.inovation.create', compact('languages', 'center_types'));
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminInovationCreateRequest   $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $inovation = new Inovation();

        $inovation->language = $request->language;
        $inovation->province_id = $request->province;
        $inovation->district_id = $request->district;
        $inovation->image = $imagePath;
        $inovation->name = $request->name;
        $inovation->address = $request->address;
        $inovation->center_type_id = $request->center_type;

        $inovation->student_name = $request->student_name;
        $inovation->student_father_name = $request->student_father_name;
        $inovation->student_grand_father_name = $request->student_grand_father_name;

        $inovation->date_gregorian = $request->date_gregorian;
        $inovation->date_ghamari = $request->date_ghamari;
        $inovation->date_shamsi = $request->date_shamsi;

        $inovation->content = $request->content;
        $inovation->meta_title = $request->meta_title;
        $inovation->meta_description = $request->meta_description;
        $inovation->status = $request->status == 1 ? 1 : 0;
        $inovation->save();

        toast('ابتکارات محصل مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.inovation.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleInovationStatus(Request $request)
    {
        try {
            $inovation = Inovation::findOrFail($request->id);
            $inovation->{$request->name} = $request->status;
            $inovation->save();

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
        $inovation = Inovation::findOrFail($id);
        $provinces = Province::where('language', $inovation->language)->get();
        $districts = District::where('language', $inovation->language)->get();
        $center_types = CenterType::all();
        return view('backend.modules.inovation.edit', compact('languages', 'inovation', 'provinces','districts', 'center_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminInovationUpdateRequest $request, string $id)
    {
        $inovation = Inovation::findOrFail($id);

        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $inovation->language = $request->language;
        $inovation->province_id = $request->province;
        $inovation->district_id = $request->district;
        $inovation->image = !empty($imagePath) ? $imagePath : $inovation->image;
        $inovation->name = $request->name;
        $inovation->address = $request->address;
        $inovation->center_type_id = $request->center_type;

        $inovation->student_name = $request->student_name;
        $inovation->student_father_name = $request->student_father_name;
        $inovation->student_grand_father_name = $request->student_grand_father_name;

        $inovation->date_gregorian = $request->date_gregorian;
        $inovation->date_ghamari = $request->date_ghamari;
        $inovation->date_shamsi = $request->date_shamsi;

        $inovation->content = $request->content;
        $inovation->meta_title = $request->meta_title;
        $inovation->meta_description = $request->meta_description;
        $inovation->status = $request->status == 1 ? 1 : 0;
        $inovation->save();
        

        toast('ابتکارات محصل مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.inovation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inovation = Inovation::findOrFail($id);
        $this->deleteFile($inovation->image);
        $inovation->delete();

        return response(['status' => 'success', 'message' => 'ابتکارات محصل مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copyInovation(string $id)
    {
        $inovation = Inovation::findOrFail($id);
        $copyImportantActivity = $inovation->replicate();
        $copyImportantActivity->save();

        toast('ابتکارات محصل مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }



    function approveInovation(Request $request): Response
    {
        $inovation = Inovation::findOrFail($request->id);
        $inovation->is_approved = $request->is_approve;
        $inovation->save();

        return response(['status' => 'success', 'message' => 'ابتکارات محصل مورد نظر تایید شد.']);
    }
}
