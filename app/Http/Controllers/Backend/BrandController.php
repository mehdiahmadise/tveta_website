<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Throwable;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(20);
        return view('backend.modules.brands.all', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.modules.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $request->validate([
            'image' => 'required'
        ]);
        $data = new Brand();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension_image = $image->getClientOriginalExtension();
            $filename_image='image1_'.time().'.'.$extension_image;

            $image->move('uploads/images/', $filename_image);
            $data->image = $filename_image;
        }
        $data->save();

        toast('حمایت کننده مورد نظر با موفقیت ثبت شد.','success');

        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view('backend.modules.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category = Brand::findOrFail($id);
            $category->delete();
            return response(['status' => 'success', 'message'=> 'حمایت کننده مورد نظر با موفقیت حذف شد.']);
        }
        
        catch(Throwable $th){
            return response(['status' => 'error', 'message'=> 'خطایی در سیستم اتفاق افتاده است.']);
        }
    }
}
