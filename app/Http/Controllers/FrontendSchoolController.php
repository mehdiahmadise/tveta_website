<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class FrontendSchoolController extends Controller
{
    public function all_schools()
    {
        $schools = School::latest()->paginate(6);
        $latest_schools = School::latest()->take(3)->get();
        return view('frontend.modules.school.all-school', compact('schools', 'latest_schools'));
    }

    public function view_school(string $slug)
    {   
        $school = School::where('slug', $slug)->first();
        $latest_schools = School::latest()->take(3)->get();
        return view('frontend.modules.school.single-school', compact('latest_schools', 'school'));
    }

    public function school_list()
    {
        $schools = School::select('name')->latest()->paginate(20);
        return view('frontend.modules.school.all-school-list', compact('schools'));
    }
}
