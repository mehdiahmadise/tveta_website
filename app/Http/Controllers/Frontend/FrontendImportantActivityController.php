<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ImportantActivity;

class FrontendImportantActivityController extends Controller
{
    public function all_important_activities()
    {
        $important_activities = ImportantActivity::latest()->paginate(6);
        $latest_important_activities = ImportantActivity::latest()->take(3)->get();
        return view('frontend.modules.important-activity.all-important-activities', compact('important_activities', 'latest_important_activities'));
    }

    public function view_important_activity(string $slug)
    {   
        $important_activity = ImportantActivity::where('slug', $slug)->first();
        $latest_important_activities = ImportantActivity::latest()->take(3)->get();
        return view('frontend.modules.important-activity.single-important-activity', compact('important_activity', 'latest_important_activities'));
    }
}
