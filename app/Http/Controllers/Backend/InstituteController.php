<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminInstituteCreateRequest;
use App\Http\Requests\AdminInstituteUpdateRequest;
use App\Models\Category;
use App\Models\CenterType;
use App\Models\District;
use App\Models\Institute;
use App\Models\Language;
use App\Models\Province;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class InstituteController extends Controller
{
    
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.institute.all', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        $center_types = CenterType::all();
        return view('backend.modules.institute.create', compact('languages', 'center_types'));
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
    public function store(AdminInstituteCreateRequest $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $institute = new Institute();

        $institute->language = $request->language;
        $institute->province_id = $request->province;
        $institute->district_id = $request->district;
        $institute->image = $imagePath;
        $institute->name = $request->name;
        $institute->address = $request->address;
        $institute->code = $request->code;
        $institute->center_type_id = $request->center_type;

        $institute->date_gregorian = $request->date_gregorian;
        $institute->date_ghamari = $request->date_ghamari;
        $institute->date_shamsi = $request->date_shamsi;

        $institute->content = $request->content;
        $institute->meta_title = $request->meta_title;
        $institute->meta_description = $request->meta_description;
        $institute->status = $request->status == 1 ? 1 : 0;
        $institute->save();

        toast('انستیتوت مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.institute.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleInstituteStatus(Request $request)
    {
        try {
            $institute = Institute::findOrFail($request->id);
            $institute->{$request->name} = $request->status;
            $institute->save();

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
        $institute = Institute::findOrFail($id);
        $provinces = Province::where('language', $institute->language)->get();
        $districts = District::where('language', $institute->language)->get();
        $center_types = CenterType::all();
        return view('backend.modules.institute.edit', compact('languages', 'institute', 'provinces','districts', 'center_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminInstituteUpdateRequest $request, string $id)
    {
        $institute = Institute::findOrFail($id);

        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $institute->language = $request->language;
        $institute->province_id = $request->province;
        $institute->district_id = $request->district;
        $institute->image = !empty($imagePath) ? $imagePath : $institute->image;
        $institute->name = $request->name;
        $institute->address = $request->address;
        $institute->code = $request->code;
        $institute->center_type_id = $request->center_type;

        $institute->date_gregorian = $request->date_gregorian;
        $institute->date_ghamari = $request->date_ghamari;
        $institute->date_shamsi = $request->date_shamsi;

        $institute->content = $request->content;
        $institute->meta_title = $request->meta_title;
        $institute->meta_description = $request->meta_description;
        $institute->status = $request->status == 1 ? 1 : 0;
        $institute->save();
        

        toast('انستیتوت مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.institute.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $institute = Institute::findOrFail($id);
        $this->deleteFile($institute->image);
        $institute->delete();

        return response(['status' => 'success', 'message' => 'انستیتوت مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copyInstitute(string $id)
    {
        $institute = Institute::findOrFail($id);
        $copyImportantActivity = $institute->replicate();
        $copyImportantActivity->save();

        toast('انستیتوت مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }



    function approveInstitute(Request $request): Response
    {
        $institute = Institute::findOrFail($request->id);
        $institute->is_approved = $request->is_approve;
        $institute->save();

        return response(['status' => 'success', 'message' => 'انستیتوت مورد نظر تایید شد.']);
    }

}
