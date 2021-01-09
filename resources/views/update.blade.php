@extends('layout')
@section('title')
    create|Book
@endsection


@section('content')
<div class="container py-5">
<form  method="POST" action="{{ route('books.update',$book->id)}}">
    @csrf
    <div class="form-group">
      <label>Book title</label>
      <input type="text" name="title" value="{{$book->title}}" class="form-control">
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea type="text" rows="3" name="desc" class="form-control">{{$book->desc}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form></div>
@endsection