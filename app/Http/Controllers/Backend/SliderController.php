<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(20);
        return view('backend.modules.sliders.all', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.modules.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Slider();
        $data['sub_heading'] = $request->sub_heading;
        $data['description'] = $request->description;

        $oldImage = $request->oldImage;
        $image = $request->file('image');

        if($image){
            $image_one = 'image'.'_'.time() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(753,655)->save('image/images/'.$image_one);

            $data->image = 'image/images/'.$image_one;

        }else{
            $data->image = $oldImage;
            // unlink($oldImage);
        }
        $data->save();

        toast('اسلایدر  مورد نظر با موفقیت ثبت شد.','success');

        return redirect()->route('admin.sliders.index');

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
        $slider = Slider::find($id);
        return view('backend.modules.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = new Slider();
        $data['sub_heading'] = $request->sub_heading;
        $data['description'] = $request->description;


        $oldImage = $request->oldImage;
        $image = $request->file('image');

        if($image){
            $request->validate([
                'image' => 'required',
            ]);
            $image_one = 'image'.'_'.time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(753,655)->save('image/images/'.$image_one);
            $data->image = 'image/images/'.$image_one;
            // unlink($oldImage);
        }
        else{
            $data->image = $oldImage;
        }
        $data->update();

        toast(' اسلایدر مورد نظر با موفقیت ابدیت شد','success');

        return redirect()->route('admin.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        // unlink($slider->image);

        return redirect(route('admin.sliders.index'));
    }
}
