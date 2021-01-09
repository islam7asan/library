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