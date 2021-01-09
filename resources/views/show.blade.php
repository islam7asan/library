@extends('layout')
@section('title')
    show|Book
@endsection
@section('content')
    <h1>book ID :{{$book->id}}</h1>
    <h2>{{$book->title}}</h2>
    <p>{{$book->desc}}</p>

    <hr>
    <a href="{{ route('books.index') }}">back</a>
@endsection
