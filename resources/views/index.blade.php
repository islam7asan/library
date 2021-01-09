@extends('layout')
@section('title')
    Books
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-5">All Books <a class="btn btn-primary" href="{{ route('books.create') }}">Create Book</a></h1>
        
        @foreach ($books as $book)
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('book.show', $book->id) }}">
                        <h3>{{ $book->title }}</h3>
                    </a>
                    <p> {{ $book->desc }}</p>
                </div>


                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="{{ route('books.update', $book->id) }}">Update Book</a>
                    <a class="btn btn-danger" href="{{ route('books.delete', $book->id) }}">Delete Book</a>
                </div>
            </div>
            <hr>
        @endforeach
        {{ $books->render() }}
    </div>
@endsection
