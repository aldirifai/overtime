<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OvertimePayRequest extends FormRequest
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
            'month' => 'required|date_format:Y-m',
        ];
    }

    public function messages()
    {
        return [
            'month.required' => 'Parameter month wajib diisi.',
            'month.date_format' => 'Parameter month harus berupa format YYYY-MM.',
        ];
    }
}
