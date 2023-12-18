<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryCreateRequest;
use App\Http\Requests\AdminCategoryUpdateRequest;
use App\Models\Category;
use App\Models\Language;
use Throwable;

class CategoryController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.category.all', compact('languages'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.category.create', compact('languages'));
    }

    public function store(AdminCategoryCreateRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->language = $request->language;
        $category->status = $request->status;
        $category->save();

        toast('دسته بندی مورد نظر با موفقیت ثبت شد.','success');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $category = Category::findOrFail($id);
        return view('backend.modules.category.edit', compact('languages', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminCategoryUpdateRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->language = $request->language;
        $category->status = $request->status;
        $category->save();

        toast('دسته بندی مورد نظر با موفقیت ابدیت شد','success')->width('350');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return response(['status' => 'success', 'message'=> 'دسته بندی مورد نظر با موفقیت حذف شد.']);
        }
        
        catch(Throwable $th){
            return response(['status' => 'error', 'message'=> 'خطایی در سیستم اتفاق افتاده است.']);
        }
    }

}
