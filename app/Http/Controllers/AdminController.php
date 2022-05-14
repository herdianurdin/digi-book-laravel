<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function manageBooks()
    {
        return view('admin.manage_books');
    }

    public function addBook() {
        return view('admin.add_book');
    }

    public function manageCategories()
    {
        return view('admin.manage_categories');
    }
}
