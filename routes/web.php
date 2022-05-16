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
    // Dashboard Admin
    Route::get('admin', 'index')->name('admin');

    // Manage Books
    Route::get('admin/manage-books', 'manageBooks')->name('manage_books');
    Route::get('admin/manage-books/add', 'addBook')->name('add_book');

    // Manage Categories
    Route::get('admin/manage-categories', 'manageCategories')->name('manage_categories');
    Route::get('admin/manage-categories/search', 'searchCategory')->name('search_category');
    Route::post('admin/manage-categories', 'storeCategory')->name('store_category');
    Route::put('admin/manage-categories/{id}/update', 'updateCategory')->name('update_category');
    Route::delete('admin/manage-categories/{id}/delete', 'destroyCategory')->name('destroy_category');
});
