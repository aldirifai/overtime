<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OvertimeRequest extends FormRequest
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
            'employee_id' => 'required|integer|exists:employees,id',
            'date' => [
                'required',
                'date',
                Rule::unique('overtimes')->where(function ($query) {
                    return $query->where('employee_id', $this->employee_id);
                }),
            ],
            'time_started' => 'required|date_format:H:i|before:time_ended',
            'time_ended' => 'required|date_format:H:i|after:time_started',
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'Parameter employee_id wajib diisi.',
            'employee_id.integer' => 'Parameter employee_id harus berupa angka.',
            'employee_id.exists' => 'Parameter employee_id tidak ditemukan.',
            'date.required_if' => 'Parameter date wajib diisi.',
            'date.required' => 'Parameter date wajib diisi.',
            'date.date' => 'Parameter date harus berupa tanggal.',
            'date.unique' => 'Tanggal sudah ada.',
            'time_started.required' => 'Parameter time_started wajib diisi.',
            'time_started.date_format' => 'Parameter time_started harus berupa format HH:mm.',
            'time_started.before' => 'Parameter time_started harus sebelum time_ended.',
            'time_ended.required' => 'Parameter time_ended wajib diisi.',
            'time_ended.date_format' => 'Parameter time_ended harus berupa format HH:mm.',
            'time_ended.after' => 'Parameter time_ended harus setelah time_started.',
        ];
    }
}
