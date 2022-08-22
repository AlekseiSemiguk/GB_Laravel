<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $categoryFilter = $request->query('category_id');
        $filters['category_id'] = $categoryFilter;
        $news = $this->getNews($filters);
        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        $news = $this->getNews(array(), $id);
        return view('news.show', [
            'news' => $news
        ]);
    }
}
