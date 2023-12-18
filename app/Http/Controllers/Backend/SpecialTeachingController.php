<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSpecialTeachingCreateRequest;
use App\Http\Requests\AdminSpecialTeachingUpdateRequest;
use App\Models\CenterType;
use App\Models\District;
use App\Models\Language;
use App\Models\Province;
use App\Models\SpecialTeaching;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpecialTeachingController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.special-teaching.all', compact('languages'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        $center_types = CenterType::all();
        return view('backend.modules.special-teaching.create', compact('languages', 'center_types'));
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
    public function store(AdminSpecialTeachingCreateRequest   $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $special_teaching = new SpecialTeaching();

        $special_teaching->language = $request->language;
        $special_teaching->province_id = $request->province;
        $special_teaching->district_id = $request->district;
        $special_teaching->image = $imagePath;
        $special_teaching->name = $request->name;
        $special_teaching->address = $request->address;
        $special_teaching->center_type_id = $request->center_type;

        $special_teaching->date_gregorian = $request->date_gregorian;
        $special_teaching->date_ghamari = $request->date_ghamari;
        $special_teaching->date_shamsi = $request->date_shamsi;

        $special_teaching->content = $request->content;
        $special_teaching->meta_title = $request->meta_title;
        $special_teaching->meta_description = $request->meta_description;
        $special_teaching->status = $request->status == 1 ? 1 : 0;
        $special_teaching->save();

        toast('تعلیمات خاص مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.special-teaching.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleSchoolStatus(Request $request)
    {
        try {
            $special_teaching = SpecialTeaching::findOrFail($request->id);
            $special_teaching->{$request->name} = $request->status;
            $special_teaching->save();

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
        $special_teaching = SpecialTeaching::findOrFail($id);
        $provinces = Province::where('language', $special_teaching->language)->get();
        $districts = District::where('language', $special_teaching->language)->get();
        $center_types = CenterType::all();
        return view('backend.modules.special-teaching.edit', compact('languages', 'special_teaching', 'provinces','districts', 'center_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminSpecialTeachingUpdateRequest $request, string $id)
    {
        $special_teaching = SpecialTeaching::findOrFail($id);

        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $special_teaching->language = $request->language;
        $special_teaching->province_id = $request->province;
        $special_teaching->district_id = $request->district;
        $special_teaching->image = !empty($imagePath) ? $imagePath : $special_teaching->image;
        $special_teaching->name = $request->name;
        $special_teaching->address = $request->address;
        $special_teaching->center_type_id = $request->center_type;

        $special_teaching->date_gregorian = $request->date_gregorian;
        $special_teaching->date_ghamari = $request->date_ghamari;
        $special_teaching->date_shamsi = $request->date_shamsi;

        $special_teaching->content = $request->content;
        $special_teaching->meta_title = $request->meta_title;
        $special_teaching->meta_description = $request->meta_description;
        $special_teaching->status = $request->status == 1 ? 1 : 0;
        $special_teaching->save();
        

        toast('تعلیمات خاص مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.special-teaching.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $special_teaching = SpecialTeaching::findOrFail($id);
        $this->deleteFile($special_teaching->image);
        $special_teaching->delete();

        return response(['status' => 'success', 'message' => 'تعلیمات خاص مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copySchool(string $id)
    {
        $special_teaching = SpecialTeaching::findOrFail($id);
        $copyImportantActivity = $special_teaching->replicate();
        $copyImportantActivity->save();

        toast('تعلیمات خاص مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }



    function approveSchool(Request $request): Response
    {
        $special_teaching = SpecialTeaching::findOrFail($request->id);
        $special_teaching->is_approved = $request->is_approve;
        $special_teaching->save();

        return response(['status' => 'success', 'message' => 'تعلیمات خاص مورد نظر تایید شد.']);
    }
}
