<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class FrontendArticleController extends Controller
{
    
    public function all_articles()
    {
        $articles = Article::latest()->paginate(6);
        $latest_articles = Article::latest()->take(3)->get();
        return view('frontend.modules.article.all-article', compact('articles', 'latest_articles'));
    }

    public function view_article(string $slug)
    {   
        $article = Article::where('slug', $slug)->first();
        $latest_articles = Article::latest()->take(3)->get();
        return view('frontend.modules.article.single-article', compact('article', 'latest_articles'));
    }
}
