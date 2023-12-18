<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminMajorCreateRequest;
use App\Http\Requests\AdminMajorUpdateRequest;
use App\Models\Language;
use App\Models\Major;
use Illuminate\Http\Request;
use Throwable;

class MajorController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.major.all', compact('languages'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.major.create', compact('languages'));
    }

    public function store(AdminMajorCreateRequest $request)
    {
        $major = new Major();
        $major->name = $request->name;
        $major->language = $request->language;
        $major->status = $request->status;
        $major->save();

        toast('رشته مورد نظر با موفقیت ثبت شد.','success');

        return redirect()->route('admin.major.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $major = Major::findOrFail($id);
        return view('backend.modules.major.edit', compact('languages', 'major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminMajorUpdateRequest $request, string $id)
    {
        $major = major::findOrFail($id);
        $major->name = $request->name;
        $major->language = $request->language;
        $major->status = $request->status;
        $major->save();

        toast('رشته مورد نظر با موفقیت ابدیت شد','success');

        return redirect()->route('admin.major.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $major = major::findOrFail($id);
            $major->delete();
            return response(['status' => 'success', 'message'=> 'رشته مورد نظر با موفقیت حذف شد.']);
        }
        
        catch(Throwable $th){
            return response(['status' => 'error', 'message'=> 'خطایی در سیستم اتفاق افتاده است.']);
        }
    }
}
