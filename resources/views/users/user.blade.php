@extends('layouts.layout')

@section('title')
    {{ $user->username }}
@endsection

@section('content')
    <div class="row">
        <div class="sidebar col-3">
            <div class="profile-picture">
                <img src="https://via.placeholder.com/150" alt="profile picture" class="rounded-circle mx-auto d-block">
            </div>
            <br>
            <div class="username">
                <h1 class="text-center">{{ $user->username }}</h1>
            </div>
            <div class="member-since">
                <p class="text-center">Member since: {{ $user->created_at }}</p>
            </div>
            @if(auth()->id() === $user->id)
                <div class="edit-profile">
                    <a href="#" class="btn btn-light">Edit profile</a>
                </div>
            @else
                <div class="edit-profile">
                    <a href="{{ route('message.send') }}" class="btn btn-light">Send message</a>
                </div>
            @endif
        </div>

        <div class="posts col-9">
            <h1 class="text-center">{{ $user->username }}'s posts</h1>
            @if($user->posts->count())
                @foreach($user->posts as $post)
                    <div class="card border-0 my-3">
                        <div class="card-body">
                            <h1 class="card-title text-center"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h1>

                            <p class="card-text">{{ $post->body }}</p>
                            <p>Created at {{ $post->created_at }}</p>
                            @if($post->user_id === auth()->id())
                                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">This user doesn't have any posts</p>
            @endif
        </div>
    </div>
@endsection