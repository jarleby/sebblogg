@extends('layouts.layout')

@section('content')
    <div class="card border-0 my-3">
        <div class="card-body">
            <h1 class="card-title text-center">{{ $post->title }}</h1>

            <p class="card-text">{{ $post->body }}</p>
            <p class="card-text">Created by: <a href="{{ route('users.show', $post->users->username) }}">{{ $post->users->username }}</a>, at {{ $post->created_at }}</p>
            @if($post->user_id === auth()->id())
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
            @endif
        </div>
    </div>

    <h2>Comments</h2>
    @foreach($post->comments as $comment)
    <div class="card border-0 my-3">
        <div class="card-body">
            <p class="card-text">{{ $comment->body }}</p>
            <p class="card-text">Commented by <a href="{{ route('users.show', $post->users->username) }}">{{ $comment->users->username }}</a>, at {{ $comment->created_at }}</p>
        </div>
    </div>
    @endforeach

    @auth
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="body">Comment: </label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control {{ $errors->has('body') ? 'border-danger' : ''}}"></textarea>
            </div>
            <input type="submit" value="Comment" class="btn btn-primary">
        </form>
    @endauth
@endsection