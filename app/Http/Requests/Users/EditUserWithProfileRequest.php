<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class EditUserWithProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    protected function prepareForValidation()
    {
        $this->merge(['is_admin' => $this->has('is_admin')]);
    }

    public function rules(): array
    {
        return [
            'is_admin' => ['required', 'boolean'],
            'address' => ['nullable', 'string', 'min:10', 'max:200'],
            'fullname' => ['nullable', 'string', 'min:5', 'max:30'],
        ];
    }
}
