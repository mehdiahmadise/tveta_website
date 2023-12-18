<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class FrontendAchievementController extends Controller
{
    public function all_achievements()
    {
        $achievements = Achievement::latest()->paginate(6);
        $latest_achievements = Achievement::latest()->take(3)->get();
        return view('frontend.modules.achievement.all-achievement', compact('achievements', 'latest_achievements'));
    }

    public function view_achievement(string $slug)
    {   
        $achievement = Achievement::where('slug', $slug)->first();
        $latest_achievements = Achievement::latest()->take(3)->get();
        return view('frontend.modules.achievement.single-achievement', compact('achievement', 'latest_achievements'));
    }
}
