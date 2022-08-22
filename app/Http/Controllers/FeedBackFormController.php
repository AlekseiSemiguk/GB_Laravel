<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:25'],
            'comments' => ['required', 'string', 'min:1', 'max:1000']
        ]);

        return response()->json($request->only(['name', 'comments']));
    }
}
