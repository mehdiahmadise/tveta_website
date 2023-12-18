<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Agreement;
use App\Models\Article;
use App\Models\Brand;
use App\Models\Gallary;
use App\Models\Guideline;
use App\Models\Headship;
use App\Models\ImportantActivity;
use App\Models\Institute;
use App\Models\News;
use App\Models\Procedure;
use App\Models\ProcurementContract;
use App\Models\School;
use App\Models\Slider;
use App\Models\SpecialTeaching;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Slider::all();
        $aboutus = Aboutus::first();
        $news = News::take(4)->get();
        $gallaries = Gallary::take(9)->get();
        $brands = Brand::all();
        $important_activities = ImportantActivity::latest()->take(4)->get();
        $institutes = Institute::latest()->take(4)->get();
        $schools = School::latest()->take(4)->get();
        $special_teachings = SpecialTeaching::latest()->take(4)->get();
        $articles = Article::latest()->take(4)->get();
        $agreements = Agreement::latest()->take(4)->get();
        $procurement_contracts = ProcurementContract::latest()->take(4)->get();
        $guidelines = Guideline::latest()->take(4)->get();
        $procedures = Procedure::latest()->take(4)->get();
        $headships = Headship::latest()->take(4)->get();

        return view('frontend.modules.home', compact('sliders', 'aboutus', 
        'news', 'gallaries', 'brands', 'important_activities', 'institutes', 'schools', 'special_teachings', 'articles', 'agreements', 'procurement_contracts', 'guidelines', 'procedures', 'headships'));
    }
}
