<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class FrontendNewsController extends Controller
{
    public function all_news()
    {
        $news = News::latest()->paginate(6);
        $latest_news = News::latest()->take(3)->get();
        return view('frontend.modules.news.all-news', compact('news', 'latest_news'));
    }

    public function view_news(string $slug)
    {   
        $news = News::first();
        $latest_news = News::latest()->take(3)->get();
        return view('frontend.modules.news.single-news', compact('news', 'latest_news'));
    }
}
