<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/cek-db', function () {
    try {
        DB::connection()->getPdo();
        return "Database connected successfully!";
    } catch (\Exception $e) {
        return "Database not connected!";
    }
});

Route::get('/employees', 'EmployeeController@index')->name('employees.index');
Route::get('/employees/create', 'EmployeeController@create')->name('employees.create');
Route::post('/employees', 'EmployeeController@store')->name('employees.store');
Route::get('/employees/{employee}', 'EmployeeController@show')->name('employees.show');
