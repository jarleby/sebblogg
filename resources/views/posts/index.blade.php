@extends('layouts.layout')

@section('content')
    @foreach($posts as $post)
        <div class="card border-0 my-3">
            <div class="card-body">
                <h1 class="card-title text-center">{{ $post->title }}</h1>

                <p class="card-text">{{ $post->body }}</p>
            </div>
        </div>
    @endforeach
@endsection