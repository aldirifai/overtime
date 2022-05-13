<?php
namespace App\Logic;

use App\Models\Employee;
use App\Models\Overtime;
use App\Models\Setting;
use Carbon\Carbon;

class CalculateOvertime
{
    private function overtime_duration_total($employee_id, $month)
    {
        $overtime = Overtime::where('employee_id', $employee_id)
            ->whereMonth('date', Carbon::parse($month)->format('m'))
            ->whereYear('date', Carbon::parse($month)->format('Y'))
            ->get();

        $total = 0;

        $overtime->each(function ($item) use (&$total) {
            $total += $item->overtime_duration();
        });

        return round($total);
    }

    private function calculate($employee_id, $month)
    {
        $overtime_duration_total = $this->overtime_duration_total($employee_id, $month);
        $employee = Employee::find($employee_id);

        $setting = Setting::first();

        if ($setting->value == 1) {
            $overtime_amount = $employee->salary / 173 * $overtime_duration_total;
        } else {
            $overtime_amount = 10000 * $overtime_duration_total;
        }
        return [
            'overtime_amount' => round($overtime_amount),
            'overtime_duration_total' => $overtime_duration_total,
        ];
    }

    public function data($month)
    {
        $overtime = Overtime::whereMonth('date', Carbon::parse($month)->format('m'))
            ->whereYear('date', Carbon::parse($month)->format('Y'))
            ->get();

        $employee = Employee::whereIn('id', $overtime->pluck('employee_id'))
            ->get();

        $response = [];

        $employee->each(function ($item) use (&$response, $month) {
            $calculate = $this->calculate($item->id, $month);
            $data = [
                'id' => $item->id,
                'name' => $item->name,
                'salary' => $item->salary,
                'overtimes' => $item->overtimes->each(function ($over) {
                    $over->overtime_duration = $over->overtime_duration();
                    return $over;
                }),
                'overtime_duration_total' => $calculate['overtime_duration_total'],
                'overtime_amount' => $calculate['overtime_amount'],
            ];

            array_push($response, $data);
        });

        return $response;
    }
}
