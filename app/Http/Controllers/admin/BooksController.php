<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        $categories = Categories::all(); // Untuk dropdown di modal
        return view('admin.pages.books', compact('books', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'books_name'    => 'required|string|max:255',
            'books_author'  => 'required|string|max:255',
            'books_images'  => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'price'         => 'required|numeric',
            'stock'         => 'required|integer',
            'books_desc'    => 'required',
        ]);

        $imagePath = $request->file('books_images')->store('images/books', 'public');

        Book::create([
            'category_id'  => $request->category_id,
            'books_name'    => $request->books_name,
            'books_author'  => $request->books_author,
            'books_images'  => $imagePath,
            'price'         => $request->price,
            'stock'         => $request->stock,
            'books_desc'    => $request->books_desc,
        ]);

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'category_id'  => 'required|exists:categories,id',
            'books_name'    => 'required|string|max:255',
            'books_images'  => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $book->books_name = $request->books_name;
        $book->category_id = $request->category_id;
        $book->books_author = $request->books_author;
        $book->price = $request->price;
        $book->stock = $request->stock;
        $book->books_desc = $request->books_desc;

        if ($request->hasFile('books_images')) {
            if ($book->books_images) {
                Storage::disk('public')->delete($book->books_images);
            }
            $book->books_images = $request->file('books_images')->store('images/books', 'public');
        }

        $book->save();
        return redirect()->back()->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if ($book->books_images) {
            Storage::disk('public')->delete($book->books_images);
        }
        $book->delete();
        return redirect()->back()->with('success', 'Buku berhasil dihapus!');
    }
}
