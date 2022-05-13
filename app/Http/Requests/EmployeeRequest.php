<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|string|min:2|unique:employees,name',
            'salary' => 'required|numeric|min:2000000|max:10000000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Parameter name wajib diisi.',
            'name.string' => 'Parameter name harus berupa text.',
            'name.min' => 'Name minimal mengunakan 2 huruf.',
            'name.unique' => 'Name sudah ada.',
            'salary.required' => 'Parameter salary wajib diisi.',
            'salary.numeric' => 'Parameter salary harus berupa angka.',
            'salary.min' => 'Salary minimal 2000000.',
            'salary.max' => 'Salary maksimal 10000000.',
        ];
    }
}
