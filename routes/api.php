<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EmployeeControllerAPI;

Route::get('/', function () {
    return response()->json([
        'message' => 'Welcome to Employee API',
        'status' => 'success',
        'code' => 200,
    ], 200);
});

Route::apiResource('employees', EmployeeControllerAPI::class);

// Route::get('/employees', [EmployeeController::class, 'index']);
// Route::get('/employees/{employee}', [EmployeeController::class, 'show']);
// Route::post('/employees', [EmployeeController::class, 'store']);
// Route::put('/employees/{employee}', [EmployeeController::class, 'update']);
// Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']);