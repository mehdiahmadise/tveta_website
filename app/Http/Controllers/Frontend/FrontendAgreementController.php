<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Agreement;
use Illuminate\Http\Request;

class FrontendAgreementController extends Controller
{
    public function all_agreements()
    {
        $agreements = Agreement::latest()->paginate(6);
        $latest_agreements = Agreement::latest()->take(3)->get();
        return view('frontend.modules.agreement.all-agreement', compact('agreements', 'latest_agreements'));
    }

    public function view_agreement(string $slug)
    {   
        $agreement = Agreement::where('slug', $slug)->first();
        $latest_agreements = Agreement::latest()->take(3)->get();
        return view('frontend.modules.agreement.single-agreement', compact('agreement', 'latest_agreements'));
    }
}
