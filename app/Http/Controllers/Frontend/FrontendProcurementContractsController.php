<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProcurementContract;
use Illuminate\Http\Request;

class FrontendProcurementContractsController extends Controller
{
    public function all_procurement_contracts()
    {
        $procurement_contracts = ProcurementContract::latest()->paginate(6);
        $latest_procurement_contracts = ProcurementContract::latest()->take(3)->get();
        return view('frontend.modules.procurement_contract.all-procurement-contract', compact('procurement_contracts', 'latest_procurement_contracts'));
    }

    public function view_procurement_contract(string $slug)
    {   
        $procurement_contract = ProcurementContract::where('slug', $slug)->first();
        $latest_procurement_contracts = ProcurementContract::latest()->take(3)->get();
        return view('frontend.modules.procurement_contract.single-procurement-contract', compact('procurement_contract', 'latest_procurement_contracts'));
    }
}
