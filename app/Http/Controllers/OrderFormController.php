<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderFormController extends Controller
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
            'phone' => ['required', 'string', 'min:6', 'max:20'],
            'email' => ['required', 'email'],
            'url' => ['required', 'string', 'min:3', 'max:2048'],
            'data' => ['required', 'string', 'min:1', 'max:1000']
        ]);

        Storage::disk('local')->append('forms/results.txt', response()->json($request->only(['name', 'phone', 'email', 'url', 'data'])));

        return response()->json($request->only(['name', 'phone', 'email', 'url', 'data']));
    }
}
