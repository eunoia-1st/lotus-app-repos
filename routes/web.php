<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\MenuCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('menus', MenuController::class);
Route::resource('menu-categories', MenuCategoryController::class);

Route::resource('employees', EmployeeController::class);
//detail shift
Route::get('employees/{employee}/details', [EmployeeController::class, 'showDetails'])->name('employees.details');
Route::get('employees/{employee}/details/edit', [EmployeeController::class, 'editDetails'])->name('employees.editDetails');
Route::put('employees/{employee}/details', [EmployeeController::class, 'updateDetails'])->name('employees.updateDetails');
