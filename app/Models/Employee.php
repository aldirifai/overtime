<?php

namespace App\Models;

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

    public function overtimes()
    {
        return $this->hasMany('App\Models\Overtime');
    }
}
