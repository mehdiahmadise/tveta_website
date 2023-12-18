<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Guideline;
use Illuminate\Http\Request;

class FrontendGuidelineController extends Controller
{
    public function all_guidelines()
    {
        $guidelines = Guideline::latest()->paginate(6);
        $latest_guidelines = Guideline::latest()->take(3)->get();
        return view('frontend.modules.guideline.all-guideline', compact('guidelines', 'latest_guidelines'));
    }

    public function view_guidelines(string $slug)
    {   
        $guideline = Guideline::where('slug', $slug)->first();
        $latest_guidelines = Guideline::latest()->take(3)->get();
        return view('frontend.modules.guideline.single-guideline', compact('guideline', 'latest_guidelines'));
    }
}
