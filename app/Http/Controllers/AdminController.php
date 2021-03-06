<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

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
        $books = Book::latest()->paginate(6);
        $categories = Category::get();

        return view('admin.index', compact('books', 'categories'));
    }

    public function manageBooks()
    {
        $books = Book::latest()->paginate(6);

        return view('admin.manage_books', compact('books'));
    }

    public function searchBook(Request $request)
    {
        $books =  Book::query()
            ->where(DB::raw('LOWER(title)'), 'LIKE', '%' . strtolower($request->search) . '%')
            ->latest()
            ->paginate(6)->withQueryString();

        return view('admin.manage_books', compact('books'));
    }

    public function addBook()
    {
        $categories = Category::get();

        return view('admin.add_book', compact('categories'));
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'description' => 'required',
            'cover' => ['required', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'file' => ['required', 'mimes:pdf', 'max:51200']
        ]);

        $coverName = time() . '.' . $request->cover->extension();
        $fileName = time() . '.' . $request->file->extension();

        $request->cover->storeAs('public/', $coverName);
        $request->file->storeAs('public/', $fileName);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'cover' => $coverName,
            'file' => $fileName,
            'category_id' => $request->category,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('manage_books')
            ->with('success', 'Book created successfully!');
    }

    public function editBook($id)
    {
        $categories = Category::get();
        $book = Book::find($id);

        return view('admin.edit_book', compact('categories', 'book'));
    }

    public function updateBook($id, Request $request)
    {
        $book = Book::find($id);
        $coverName = $book->cover;
        $fileName = $book->file;

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        if ($request->cover !== null) {
            $request->validate([
                'cover' => ['required', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            ]);

            Storage::delete('public/' . $book->cover);

            $coverName = time() . '.' . $request->cover->extension();
            $request->cover->storeAs('public', $coverName);
        }

        if ($request->file !== null) {
            $request->validate([
                'file' => ['required', 'mimes:pdf', 'max:51200']
            ]);

            Storage::delete('public/' . $book->file);

            $fileName = time() . '.' . $request->file->extension();
            $request->file->storeAs('public', $fileName);
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'cover' => $coverName,
            'file' => $fileName,
            'category_id' => $request->category,
        ]);

        return redirect()->route('manage_books')
            ->with('success', 'Book successfully updated!');
    }

    public function destroyBook($id)
    {
        $book = Book::find($id);

        Storage::delete('public/' . $book->cover);
        Storage::delete('public/' . $book->file);

        $book->delete();

        return redirect()->route('manage_books')
            ->with('success', 'Book deleted successfully!');
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
            ->where(DB::raw('LOWER(name)'), 'LIKE', '%' . strtolower($request->search) . '%')
            ->latest()
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
