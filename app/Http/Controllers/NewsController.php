<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = app(News::class)->getNews();
        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(string $slug)
    {
        $news = app(News::class)->getNewsBySlug($slug);
        return view('news.show', [
            'news' => $news
        ]);
    }
}
