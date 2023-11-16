<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDivideRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'param1' => 'required|numeric|max:999999',
            'param2' => 'required|numeric|max:999999|not_in:0',
        ];
    }

    public function messages(): array
{
    return [
        'param2.not_in' => ':attribute cannot divide by 0.',
    ];
}
}
