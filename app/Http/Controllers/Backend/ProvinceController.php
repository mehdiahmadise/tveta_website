<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProvinceCreateRequest;
use App\Http\Requests\AdminProvinceUpdateRequest;
use App\Models\Language;
use App\Models\Province;
use Illuminate\Http\Request;
use Throwable;

class ProvinceController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.province.all', compact('languages'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.province.create', compact('languages'));
    }

    public function store(AdminProvinceCreateRequest $request)
    {
        $province = new Province();
        $province->name = $request->name;
        $province->language = $request->language;
        $province->status = $request->status;
        $province->save();

        toast('ولایت مورد نظر با موفقیت ثبت شد.','success');

        return redirect()->route('admin.province.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $province = province::findOrFail($id);
        return view('backend.modules.province.edit', compact('languages', 'province'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminProvinceUpdateRequest $request, string $id)
    {
        $province = province::findOrFail($id);
        $province->name = $request->name;
        $province->language = $request->language;
        $province->status = $request->status;
        $province->save();

        toast('ولایت مورد نظر با موفقیت اپدیت شد','success')->width('350');

        return redirect()->route('admin.province.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $province = province::findOrFail($id);
            $province->delete();
            return response(['status' => 'success', 'message'=> 'ولایت مورد نظر با موفقیت حذف شد.']);
        }
        
        catch(Throwable $th){
            return response(['status' => 'error', 'message'=> 'خطایی در سیستم اتفاق افتاده است.']);
        }
    }
}
