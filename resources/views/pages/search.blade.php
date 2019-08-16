@extends('layouts.layout')

@section('content')
    @if(count($posts))
        @foreach($posts as $post)
            <div class="card border-0 my-3">
                <div class="card-body">
                    <h1 class="card-title text-center"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h1>

                    <p class="card-text">{{ str_limit($post->body, 500) }}</p>
                    <p>Created by: <a href="{{ route('users.show', $post->users->username) }}">{{ $post->users->username }}</a>, at {{ $post->created_at }}</p>
                </div>
            </div>
        @endforeach
    @else
        <h1 class="text-center">There wasn't any results for your search. Try using another word to find what you're searching for.</h1>
    @endif
@endsection