<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('menus', MenuController::class);
Route::resource('menu-categories', MenuCategoryController::class);
