<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    public function index() {

        $setting = Setting::first();
        return view('backend.modules.setting.site-setting', compact('setting'));
    }

    public function update(Request $request) {

        $request->validate([
            'footer_description' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'phone_number2' => 'nullable',
            'address' => 'required',
            'face_book_url' => 'required',
            'linkedin_url' => 'required',
            'twitter_url' => 'required',
            'instagram_url' => 'required',
            'youtube_url' => 'required',
        ]);

        $setting = Setting::first();
        $setting->footer_description = $request->footer_description;
        $setting->email = $request->email;
        $setting->phone_number = $request->phone_number;
        $setting->phone_number2 = $request->phone_number2;
        $setting->address = $request->address;
        $setting->face_book_url = $request->face_book_url;
        $setting->linkedin_url = $request->linkedin_url;
        $setting->twitter_url = $request->twitter_url;
        $setting->instagram_url = $request->instagram_url;
        $setting->youtube_url = $request->youtube_url;
        

        $oldlogo = $request->oldlogo;
        $logo = $request->file('logo');

        $oldbanner = $request->oldbanner;
        $banner = $request->file('banner');

        if($logo && $banner)
        {
            $request->validate([
                'logo' => 'required',
                'banner' => 'required',
            ]);

            $logo_one = 'logo'.'_'.time() . '.' . $logo->getClientOriginalExtension();
            $logo-> move(public_path('public/image/images/'), $logo_one);
            $setting->logo = 'image/images/'.$logo_one;

            $banner_one = 'banner'.'_'.time() . '.' . $banner->getClientOriginalExtension();
            Image::make($banner)->resize(1920,400)->save('image/images/'.$banner_one);
            $setting->banner = 'image/images/'.$banner_one;

            // unlink($oldlogo);
            // unlink($oldbanner);

        }else if($logo){

            $request->validate([
                'logo' => 'required',
            ]);

            $logo_one = 'logo'.'_'.time() . '.' . $logo->getClientOriginalExtension();            $logo->move(public_path('image/images/'), $logo_one);
            $setting->logo = 'image/images/'.$logo_one;

            // unlink($oldlogo);

        }else if($banner){

            $request->validate([
                'banner' => 'required',
            ]);

            $banner_one = 'banner'.'_'.time() . '.' . $banner->getClientOriginalExtension();
            $banner-> move(public_path('image/images/'), $banner_one);
            $setting->banner = 'image/images/'.$banner_one;

            // unlink($oldbanner);

        }
        else{
            $setting->logo = $oldlogo;
            $setting->banner = $oldbanner;
        }

        $setting->save();
        return redirect(route('admin.dashboard'));
    }
}
