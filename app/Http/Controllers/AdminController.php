<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;

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

    public function addBook()
    {
        return view('admin.add_book');
    }

    public function manageCategories()
    {
        $categories = Category::get();

        return view('admin.manage_categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories']
        ]);

        Category::create($request->all());

        return redirect()->route('manage_categories')
            ->with('success', 'Category created successfully!');
    }

    public function searchCategory(Request $request)
    {
        $categories =  Category::query()
            ->where('name', 'LIKE', '%' . $request->search . '%')
            ->get();

        return view('admin.manage_categories', compact('categories'));
    }

    public function updateCategory($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories']
        ]);

        Category::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('manage_categories')
            ->with('success', 'Category successfully updated!');
    }

    public function destroyCategory($id)
    {
        $category = Category::find($id);

        if ($category->books()->count() > 0) {
            return redirect()->route('manage_categories')
                ->with('failed', 'Category has been used!');
        }

        $category->delete();

        return redirect()->route('manage_categories')
            ->with('success', 'Category ' . $category->name . ' successfully deleted!');
    }
}
