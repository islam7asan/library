<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(3);
        return view("index", compact('books'));
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view("show", compact('book'));
    }
    public function create(request $request)
    {
        if ($request->isMethod('Get')) {
            return view('create');
        } else {
            $request->validate([
                'title' => "required|string|max:100|unique:App\Models\Book,title",
                'desc' => 'required|string',
                'img' => 'required|image|mimes:jpg,png'
            ]);
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = 'book-' . uniqid() . ".$ext";
            $img->move(public_path('uploads/Books'), $name);
            $book = Book::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'img' => $name
            ]);
            return redirect(route('books.index'));
        }
    }
    public function update(request $request, $id)
    {
        if ($request->isMethod('Get')) {
            $book = Book::findOrFail($id);
            return view('update', compact('book'));
        } else {
            $request->validate([
                'title' => "required|string|max:100",
                'desc' => 'required|string',
                'img' => 'nullable|mimes:jpg,png'
            ]);
            $book = Book::FindOrFail($id);
            $name = $book->img;
            if ($request->hasFile('img')) {
                if ($name !== null)
                {
                    unlink(public_path("uploads/Books/") . $book->img); 
                }
                $img = $request->file('img');
                $ext = $img->getClientOriginalExtension();
                $name = 'book-' . uniqid() . ".$ext";
                $img->move(public_path('uploads/Books'), $name);
            }
            $book->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'img' => $name
            ]);
            return redirect(route('books.index'));
        }
    }
    public function delete($id)
    {
        $book = Book::findOrFail($id);
        if ($book->img !== null) {
            unlink(public_path("uploads/Books/") . $book->img);
        }
        $book->delete();
        return redirect(route('books.index'));
    }
}
