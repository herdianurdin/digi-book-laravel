<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
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

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::any('/search', 'searchBook')->name('search_book');
    Route::get('/category', 'categoryBook')->name('category_book');
    Route::any('/category/filter', 'filterBookByCategory')->name('filter_by_category');
    Route::get('/about', 'about')->name('about');
});

Auth::routes();

Route::controller(AdminController::class)->group(function () {
    // Dashboard Admin
    Route::get('admin', 'index')->name('admin');

    // Manage Books
    Route::get('admin/manage-books', 'manageBooks')->name('manage_books');
    Route::get('admin/manage-books/search', 'searchBook')->name('search_book_admin');
    Route::get('admin/manage-books/add', 'addBook')->name('add_book');
    Route::post('admin/manage-books/add', 'storeBook')->name('store_book');
    Route::get('admin/manage-books/edit/{id}', 'editBook')->name('edit_book');
    Route::put('admin/manage-books/edit/{id}/update', 'updateBook')->name('update_book');
    Route::delete('admin/manage-books/{id}/delete', 'destroyBook')->name('destroy_book');

    // Manage Categories
    Route::get('admin/manage-categories', 'manageCategories')->name('manage_categories');
    Route::get('admin/manage-categories/search', 'searchCategory')->name('search_category');
    Route::post('admin/manage-categories', 'storeCategory')->name('store_category');
    Route::put('admin/manage-categories/{id}/update', 'updateCategory')->name('update_category');
    Route::delete('admin/manage-categories/{id}/delete', 'destroyCategory')->name('destroy_category');
});
