@extends('layouts.layout')

@section('content')
    <div class="card border-0 my-3">
        <div class="card-body">
            <h1 class="card-title text-center">{{ $post->title }}</h1>

            <p class="card-text">{{ $post->body }}</p>
            @if($post->user_id === auth()->id())
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
            @endif
        </div>
    </div>
@endsection