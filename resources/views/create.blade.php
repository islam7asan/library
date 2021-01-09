@extends('layout')
@section('title')
    create|Book
@endsection


@section('content')
<div class="container py-5">
<form  method="POST" action="{{ route('books.create')}}">
    @csrf
    <div class="form-group">
      <label>Book title</label>
      <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea type="text" rows="3" name="desc" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form></div>
@endsection