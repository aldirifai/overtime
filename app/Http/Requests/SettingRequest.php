<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'key' => 'required|in:overtime_method',
            'value' => 'required|exists:references,id',
        ];
    }

    public function messages()
    {
        return [
            'key.required' => 'Parameter key wajib diisi.',
            'key.in' => 'Parameter key hanya bisa diisi overtime_method.',
            'value.required' => 'Parameter value wajib diisi.',
            'value.exists' => 'Parameter value harus sama dengan id di tabel references.',
        ];
    }
}
