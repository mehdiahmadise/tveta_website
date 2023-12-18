<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Headship;
use Illuminate\Http\Request;

class FrontendHeadshipController extends Controller
{
    public function all_headships()
    {
        $headships = Headship::latest()->paginate(6);
        $latest_headships = Headship::latest()->take(3)->get();
        return view('frontend.modules.headship.all-headship', compact('headships', 'latest_headships'));
    }

    public function view_headship(string $slug)
    {   
        $headship = Headship::where('slug', $slug)->first();
        $latest_headships = Headship::latest()->take(3)->get();
        return view('frontend.modules.headship.single-headship', compact('headship', 'latest_headships'));
    }
}
