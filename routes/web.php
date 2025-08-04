<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\QuestionCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('menus', MenuController::class);
Route::resource('menu-categories', MenuCategoryController::class);

// Employees
Route::resource('employees', EmployeeController::class);
//detail shift
Route::get('employees/{employee}/details', [EmployeeController::class, 'showDetails'])->name('employees.details');
Route::get('employees/{employee}/details/edit', [EmployeeController::class, 'editDetails'])->name('employees.editDetails');
Route::put('employees/{employee}/details', [EmployeeController::class, 'updateDetails'])->name('employees.updateDetails');

// Customers
Route::resource('customers', CustomerController::class);

// Question
Route::resource('question-categories', QuestionCategoryController::class);
Route::patch('/question-categories/{category}/toggle', [QuestionCategoryController::class, 'togglePublish'])->name('question-categories.toggle');
