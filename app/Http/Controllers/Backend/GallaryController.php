<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallary;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    public function index()
    {
        $gallaries =  Gallary::paginate(20);
        return view('backend.modules.gallary.all', compact('gallaries'));
    }
    public function create()
    {
        return view('backend.modules.gallary.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image1' => 'required',
            'image_size1' => 'required',
            'image2' => 'required',
            'image_size2' => 'required',
            'image3' => 'required',
            'image_size3' => 'required',
        ]);

        $data = new Gallary();

        $data->image1 = $request->image1;
        $data->image2 = $request->image2;
        $data->image3 = $request->image3;

        $data->image_size1 = $request->image_size1;
        $data->image_size2 = $request->image_size2;
        $data->image_size3 = $request->image_size3;

        $image1 = $request->file('image1');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');

        if($request->hasFile('image1') && $request->hasFile('image2') && $request->hasFile('image3'))
        {
            $image1=$request->file('image1');
            $image2=$request->file('image2');
            $image3=$request->file('image3');

            $extension_image1=$image1->getClientOriginalExtension();
            $extension_image2=$image2->getClientOriginalExtension();
            $extension_image3=$image3->getClientOriginalExtension();

            $filename_image1='image1_'.time().'.'.$extension_image1;
            $filename_image2='image2_'.time().'.'.$extension_image2;
            $filename_image3='image3_'.time().'.'.$extension_image3;
            
            $image1->move('uploads/images/', $filename_image1);
            $image2->move('uploads/images/', $filename_image2);
            $image3->move('uploads/images/', $filename_image3);
            $data->image1 = $filename_image1;
            $data->image2 = $filename_image2;
            $data->image3 = $filename_image3;
        }
        else{
            return redirect()->back();
        }

        $data->save();

        toast('تصاویر گالری مورد نظر با موفقیت ثبت شد.','success');

        return redirect()->route('admin.gallaries.index');
    }

    public function destroy($id)
    {
        $gallary = Gallary::find($id);
        return view('admin.');
    }
}
