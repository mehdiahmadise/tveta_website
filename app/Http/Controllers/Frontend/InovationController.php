<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Inovation;
use Illuminate\Http\Request;

class InovationController extends Controller
{
    public function all_inovations()
    {
        $inovations = Inovation::latest()->paginate(6);
        $latest_inovations = Inovation::latest()->take(3)->get();
        return view('frontend.modules.inovation.all-inovation', compact('inovations', 'latest_inovations'));
    }

    public function view_inovation(string $slug)
    {   
        $inovation = Inovation::where('slug', $slug)->first();
        $latest_inovations = Inovation::latest()->take(3)->get();
        return view('frontend.modules.inovation.single-inovation', compact('inovation', 'latest_inovations'));
    }
}
