<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsSource;
use App\Queries\NewsSourceQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsSources = NewsSource::all();
        return view('admin.news_sources.index', [
            'newsSources' => $newsSources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news_sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        NewsSourceQueryBuilder $builder
    ): RedirectResponse {

        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255']
        ]);

        $newsSource = $builder->create(
            $request->only(['title'])
        );

        if($newsSource) {
            return redirect()->route('admin.news_sources.index')
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsSource $newsSource)
    {
        return view('admin.news_sources.edit', [
            'newsSource' => $newsSource,
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
        NewsSource $newsSource,
        NewsSourceQueryBuilder $builder
    ): RedirectResponse {
        if($builder->update($newsSource, $request->only(['title']))) {
            return redirect()->route('admin.news_sources.index')
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
    public function destroy(NewsSource $newsSource)
    {
        $newsSource->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
