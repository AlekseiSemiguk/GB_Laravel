<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FeedbackRequest $request)
    {
        $feedback = Feedback::create($request->validated());

        if($feedback) {
            return redirect()->route('contacts.index')
                ->with('success', __('messages.forms.feedback.success'));
        }

        return back()->with('error', __('messages.forms.feedback.fail'));

        //return response()->json($feedback);
    }
}
