<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('news.detail');

/*        return view('news.detail', [
            'news' => News::findOrFail($id)
        ]);*/
    }
}
