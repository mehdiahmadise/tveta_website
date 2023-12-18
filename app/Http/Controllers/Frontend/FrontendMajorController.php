<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class FrontendMajorController extends Controller
{
    public function all_majors()
    {
        $majors = Major::latest()->paginate(20);
        return view('frontend.modules.major.majors', compact('majors'));
    }
}
