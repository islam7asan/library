<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(3);
        return view("index",compact('books'));
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view("show",compact('book'));
    }
    public function create(request $request)
    {
        if ($request->isMethod('Get'))
        {
            return view('create');
        }
        else
        {
            $request->validate([
                'title' => "required|string|max:100|unique:App\Models\Book,title",
                'desc' => 'required|string'
            ]);
            $book = Book::create([
                'title'=>$request->title,
                'desc'=>$request->desc
                ]);
            return redirect(route('books.index'));
        }
    }
    public function update(request $request, $id)
    {
        if ($request->isMethod('Get'))
        {
            $book = Book::findOrFail($id);
            return view('update',compact('book'));
        }
        else
        {
            $request->validate([
                'title' => "required|string|max:100|unique:App\Models\Book,title",
                'desc' => 'required|string',
                'img' => 'image|size:5120|mimes:jpg,png'
            ]);
            $book = Book::where('id',$id)->update([
                'title'=>$request->title,
                'desc'=>$request->desc
                ]);
            return redirect(route('books.index'));
        }
    }
    public function delete($id)
    {
        $book =Book::where('id',$id)->delete();
        return redirect(route('books.index'));
    }
}