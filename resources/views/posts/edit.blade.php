@extends('layouts.layout')

@section('content')
    <h1>Update Post</h1>
    @include('layouts.error')
    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="my-2">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="body">Text: </label>
            <textarea name="body" id="body" cols="30" rows="15" class="form-control">{{ $post->body }}</textarea>
        </div>
        <input type="submit" value="Update Post" class="btn btn-primary">
    </form>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="my-2">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete Post" class="btn btn-danger">
    </form>
@endsection