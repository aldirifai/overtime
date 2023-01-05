<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'salary',
    ];

    public function overtimes($month = null)
    {
        if ($month) {
            return $this->hasMany('App\Models\Overtime')
                ->whereMonth('date', Carbon::parse($month)->format('m'))
                ->whereYear('date', Carbon::parse($month)->format('Y'))->get();
        }
        return $this->hasMany('App\Models\Overtime');
    }
}
