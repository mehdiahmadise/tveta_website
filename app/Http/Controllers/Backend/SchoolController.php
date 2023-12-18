<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSchoolCreateRequest;
use App\Http\Requests\AdminSchoolUpdateRequest;
use App\Models\CenterType;
use App\Models\District;
use App\Models\Language;
use App\Models\Province;
use App\Models\School;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchoolController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.school.all', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        $center_types = CenterType::all();
        return view('backend.modules.school.create', compact('languages', 'center_types'));
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
    public function store(AdminSchoolCreateRequest   $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $school = new School();

        $school->language = $request->language;
        $school->province_id = $request->province;
        $school->district_id = $request->district;
        $school->image = $imagePath;
        $school->name = $request->name;
        $school->address = $request->address;
        $school->center_type_id = $request->center_type;

        $school->date_gregorian = $request->date_gregorian;
        $school->date_ghamari = $request->date_ghamari;
        $school->date_shamsi = $request->date_shamsi;

        $school->content = $request->content;
        $school->meta_title = $request->meta_title;
        $school->meta_description = $request->meta_description;
        $school->status = $request->status == 1 ? 1 : 0;
        $school->save();

        toast('لیسه مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.school.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleSchoolStatus(Request $request)
    {
        try {
            $school = school::findOrFail($request->id);
            $school->{$request->name} = $request->status;
            $school->save();

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
        $school = school::findOrFail($id);
        $provinces = Province::where('language', $school->language)->get();
        $districts = District::where('language', $school->language)->get();
        $center_types = CenterType::all();
        return view('backend.modules.school.edit', compact('languages', 'school', 'provinces','districts', 'center_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminSchoolUpdateRequest $request, string $id)
    {
        $school = school::findOrFail($id);

        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $school->language = $request->language;
        $school->province_id = $request->province;
        $school->district_id = $request->district;
        $school->image = !empty($imagePath) ? $imagePath : $school->image;
        $school->name = $request->name;
        $school->address = $request->address;
        $school->center_type_id = $request->center_type;

        $school->date_gregorian = $request->date_gregorian;
        $school->date_ghamari = $request->date_ghamari;
        $school->date_shamsi = $request->date_shamsi;

        $school->content = $request->content;
        $school->meta_title = $request->meta_title;
        $school->meta_description = $request->meta_description;
        $school->status = $request->status == 1 ? 1 : 0;
        $school->save();
        

        toast('لیسه مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.school.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $school = school::findOrFail($id);
        $this->deleteFile($school->image);
        $school->delete();

        return response(['status' => 'success', 'message' => 'لیسه مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copySchool(string $id)
    {
        $school = school::findOrFail($id);
        $copyImportantActivity = $school->replicate();
        $copyImportantActivity->save();

        toast('لیسه مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }



    function approveSchool(Request $request): Response
    {
        $school = school::findOrFail($request->id);
        $school->is_approved = $request->is_approve;
        $school->save();

        return response(['status' => 'success', 'message' => 'لیسه مورد نظر تایید شد.']);
    }
}
