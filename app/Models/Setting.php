<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'key';

    protected $fillable = [
        'key',
        'value',
    ];

    public function reference()
    {
        return $this->belongsTo('App\Models\Reference', 'key', 'id');
    }
}
