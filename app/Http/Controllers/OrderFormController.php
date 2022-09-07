<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\OrderRequest;
use App\Models\Order;
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
    public function __invoke(OrderRequest $request)
    {
        $order = Order::create($request->validated());

        if($order) {
            return redirect()->route('make_order.index')
                ->with('success', __('messages.forms.make_order.success'));
        }

        return back()->with('error', __('messages.forms.make_order.fail'));

        //Storage::disk('local')->append('forms/results.txt', json_encode($request->only(['name', 'phone', 'email', 'url', 'data'])));

        //return response()->json($request->only(['name', 'phone', 'email', 'url', 'data']));
    }
}
