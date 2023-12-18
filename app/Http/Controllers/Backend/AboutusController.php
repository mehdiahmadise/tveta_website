<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        $aboutus = Aboutus::first();
        return view('backend.modules.about.aboutus', compact('aboutus'));
    }

    public function update(Request $request)
    {
        $about_us = Aboutus::first();
        $about_us->title = $request->title;
        $about_us->content = $request->content;
        
        $oldImage = $request->oldImage;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('image/images/', $filename);
            $about_us->image = $filename;
        }else{
            $about_us->image = $oldImage;
            // unlink($oldImage);
        }

        $about_us->save();
        return redirect(route('admin.dashboard'));
    }
}
