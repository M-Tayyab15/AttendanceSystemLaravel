<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ShiftController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


// Route for managing employees
Route::resource('employees', EmployeeController::class);
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('employees/{id}/view', [EmployeeController::class, 'view'])->name('employees.view');
Route::get('employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

Route::resource('departments', DepartmentController::class);

Route::resource('designations', DesignationController::class);

Route::resource('shifts', ShiftController::class);

