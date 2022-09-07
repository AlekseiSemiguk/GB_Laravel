<?php

namespace App\Http\Requests\Forms;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:25'],
            'phone' => ['required', 'string', 'min:6', 'max:20'],
            'email' => ['required', 'email'],
            'url' => ['required', 'url', 'min:3', 'max:2048'],
            'data' => ['required', 'string', 'min:1', 'max:1000']
        ];
    }
}
