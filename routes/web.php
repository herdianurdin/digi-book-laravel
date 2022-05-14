<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::controller(AdminController::class)->group(function () {
    Route::get('admin', 'index')->name('admin');
    Route::get('admin/manage-books', 'manageBooks')->name('manage_books');
    Route::get('admin/manage-books/add', 'addBook')->name('add_book');
    Route::get('admin/manage-categories', 'manageCategories')->name('manage_categories');
});
