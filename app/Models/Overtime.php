<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $hidden = ['employee_id'];

    protected $fillable = [
        'employee_id',
        'date',
        'time_started',
        'time_ended',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function overtime_duration()
    {
        $startTime = Carbon::parse($this->time_started);
        $finishTime = Carbon::parse($this->time_ended);

        $differenceInSeconds = $finishTime->diffInSeconds($startTime);
        $differenceInHours = $differenceInSeconds / 3600;

        return $differenceInHours;
    }
}
