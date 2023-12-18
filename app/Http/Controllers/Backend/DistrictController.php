<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDistrictCreateRequest;
use App\Http\Requests\AdminDistrictUpdateRequest;
use App\Models\District;
use App\Models\Language;
use App\Models\Province;
use Illuminate\Http\Request;
use Throwable;

class DistrictController extends Controller
{
    public function index()
    {
        $languages = Language::all();

        return view('backend.modules.district.all', compact('languages'));
    }

    public function create()
    {
        $languages = Language::all();
        $provinces = Province::all();
        return view('backend.modules.district.create', compact('languages', 'provinces'));
    }

    public function store(AdminDistrictCreateRequest $request)
    {
        $district = new District();
        $district->name = $request->name;
        $district->language = $request->language;
        $district->status = $request->status;
        $district->province_id = $request->province;
        $district->save();

        toast('ولسوالی مورد نظر با موفقیت ثبت شد.','success');

        return redirect()->route('admin.district.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $district = District::findOrFail($id);
        $provinces = Province::where('language', $district->language)->get();
        return view('backend.modules.district.edit', compact('languages', 'district', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminDistrictUpdateRequest $request, string $id)
    {
        $district = District::findOrFail($id);
        $district->name = $request->name;
        $district->language = $request->language;
        $district->status = $request->status;
        $district->province_id = $request->province;
        $district->save();

        toast('ولسوالی مورد نظر با موفقیت اپدیت شد','success')->width('350');

        return redirect()->route('admin.district.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $district = District::findOrFail($id);
            $district->delete();
            return response(['status' => 'success', 'message'=> 'ولسوالی مورد نظر با موفقیت حذف شد.']);
        }
        
        catch(Throwable $th){
            return response(['status' => 'error', 'message'=> 'خطایی در سیستم اتفاق افتاده است.']);
        }
    }

    public function fetchProvince(Request $request)
    {
        $provinces = Province::where('language', $request->lang)->get();
        return $provinces;
    }
}
