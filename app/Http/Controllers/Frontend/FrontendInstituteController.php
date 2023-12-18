<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use Illuminate\Http\Request;

class FrontendInstituteController extends Controller
{
    public function all_institutes()
    {
        $institutes = Institute::latest()->paginate(6);
        $latest_institutes = Institute::latest()->take(3)->get();
        return view('frontend.modules.institute.all-institute', compact('institutes', 'latest_institutes'));
    }

    public function view_institute(string $slug)
    {   
        $institute = Institute::where('slug', $slug)->first();
        $latest_institutes = Institute::latest()->take(3)->get();
        return view('frontend.modules.institute.single-institute', compact('institute', 'latest_institutes'));
    }

    public function institute_list()
    {
        $institutes = Institute::select('name')->latest()->paginate(20);
        return view('frontend.modules.institute.all-institute-list', compact('institutes'));
    }
}
