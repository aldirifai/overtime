<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::patch('settings', [SettingController::class, 'update']);
Route::post('employees', [EmployeeController::class, 'store']);
Route::post('overtimes', [OvertimeController::class, 'store']);
Route::get('overtime-pays/calculate', [OvertimeController::class, 'pays']);
