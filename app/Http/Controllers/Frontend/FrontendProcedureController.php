<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Procedure;
use Illuminate\Http\Request;

class FrontendProcedureController extends Controller
{
    public function all_procedures()
    {
        $procedures = Procedure::latest()->paginate(6);
        $latest_procedures = Procedure::latest()->take(3)->get();
        return view('frontend.modules.procedure.all-procedure', compact('procedures', 'latest_procedures'));
    }

    public function view_procedures(string $slug)
    {   
        $procedure = Procedure::where('slug', $slug)->first();
        $latest_procedures = Procedure::latest()->take(3)->get();
        return view('frontend.modules.procedure.single-procedure', compact('procedure', 'latest_procedures'));
    }
}
