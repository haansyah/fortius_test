<?php

use App\Http\Controllers\Api\APIEmployeeController;
use Illuminate\Support\Facades\Route;


Route::apiResource('employees', APIEmployeeController::class);
