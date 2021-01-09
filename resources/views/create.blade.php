@extends('layout')
@section('title')
    create | Book
@endsection


@section('content')
    <div class="container py-5">
        @include('inc.error')
        <form method="POST" action="{{ route('books.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Book title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea type="text" rows="3" name="desc" class="form-control">{{ old('desc') }}</textarea>
            </div>
            <div class="form-group">
                <label>Book Image</label>
                <input type="file" class="form-control-file" name="img">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('books.index') }}">Cancel</a>
        </form>
    </div>
@endsection
