<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $newsSources = NewsSource::all();

        return view('admin.news.create', [
            'categories' => $categories,
            'newsSources' => $newsSources
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        NewsQueryBuilder $builder
    ): RedirectResponse {

        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255']
        ]);

        $news = $builder->create(
            $request->only(['category_id', 'news_source_id', 'date',
                'title', 'author', 'status', 'image', 'anonce', 'description'])
        );

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $newsSources = NewsSource::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'newsSources' => $newsSources
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        News $news,
        NewsQueryBuilder $builder
    ): RedirectResponse {
        if($builder->update($news, $request->only(['category_id',
            'title', 'author', 'status', 'image', 'anonce', 'description', 'date']))) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');

        }

        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
