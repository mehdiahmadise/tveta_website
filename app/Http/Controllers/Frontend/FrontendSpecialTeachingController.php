<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SpecialTeaching;
use Illuminate\Http\Request;

class FrontendSpecialTeachingController extends Controller
{
    public function all_special_teachings()
    {
        $special_teachings = SpecialTeaching::latest()->paginate(6);
        $latest_special_teachings = SpecialTeaching::latest()->take(3)->get();
        return view('frontend.modules.special-teaching.all-special-teaching', compact('special_teachings', 'latest_special_teachings'));
    }

    public function view_special_teaching(string $slug)
    {   
        $special_teaching = SpecialTeaching::where('slug', $slug)->first();
        $latest_special_teachings = SpecialTeaching::latest()->take(3)->get();
        return view('frontend.modules.special-teaching.single-special-teaching', compact('latest_special_teachings', 'special_teaching'));
    }

    public function all_special_teachings_list()
    {
        $special_teachings = SpecialTeaching::select('name')->latest()->paginate(20);
        return view('frontend.modules.special-teaching.all-special-teaching-list', compact('special_teachings'));
    }
}
