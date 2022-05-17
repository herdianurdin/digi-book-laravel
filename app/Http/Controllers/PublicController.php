<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;

class PublicController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(6);

        return view('public.index', compact('books'));
    }

    public function searchBook(Request $request)
    {
        $books = Book::query()
            ->where('title', 'LIKE', '%' . $request->search . '%')
            ->latest()
            ->paginate(6)->withQueryString();

        return view('public.index', compact('books'));
    }

    public function categoryBook()
    {
        $books = Book::latest()->paginate(6);
        $categories = Category::get();
        $currentCategory = null;

        return view('public.category', compact('books', 'categories', 'currentCategory'));
    }

    public function filterBookByCategory(Request $request)
    {
        $books = Book::query()
            ->where('category_id', $request->category)
            ->latest()
            ->paginate(6)->withQueryString();
        $categories = Category::get();
        $currentCategory = $request->category;

        return view('public.category', compact('books', 'categories', 'currentCategory'));
    }

    public function about()
    {
        return view('public.about');
    }
}
