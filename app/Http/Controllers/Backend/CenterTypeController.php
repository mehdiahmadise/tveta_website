<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCenterTypeCreateRequest;
use App\Http\Requests\AdminCenterTypeUpdateRequest;
use App\Models\CenterType;
use App\Models\Language;
use Throwable;

class CenterTypeController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.center_type.all', compact('languages'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.center_type.create', compact('languages'));
    }

    public function store(AdminCenterTypeCreateRequest $request)
    {
        $category = new CenterType();
        $category->name = $request->name;
        $category->language = $request->language;
        $category->status = $request->status;
        $category->save();

        toast('مرکز تعلیمی مورد نظر با موفقیت ثبت شد.','success');

        return redirect()->route('admin.center-type.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $center_type = CenterType::findOrFail($id);
        return view('backend.modules.center_type.edit', compact('languages', 'center_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminCenterTypeUpdateRequest $request, string $id)
    {
        $center_type = CenterType::findOrFail($id);
        $center_type->name = $request->name;
        $center_type->language = $request->language;
        $center_type->status = $request->status;
        $center_type->save();

        toast('مرکز تعلیمی مورد نظر با موفقیت ابدیت شد','success');

        return redirect()->route('admin.center-type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $center_type = CenterType::findOrFail($id);
            $center_type->delete();
            return response(['status' => 'success', 'message'=> 'مرکز تعلیمی مورد نظر با موفقیت حذف شد.']);
        }
        
        catch(Throwable $th){
            return response(['status' => 'error', 'message'=> 'خطایی در سیستم اتفاق افتاده است.']);
        }
    }
}
