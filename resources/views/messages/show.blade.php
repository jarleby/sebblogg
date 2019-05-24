@extends('layouts.layout')

@section('content')
    <h1 class="text-center">All your messages</h1>
    @foreach($messages as $message)
        <div class="message row my-3 mx-1 border">
            <div class="messenger col-12 col-md-2 my-2">
                <img src="https://via.placeholder.com/75" alt="profile picture" class="rounded-circle mx-auto d-block">
                <p class="text-center"><a href="{{ $message->users->id === auth()->id() ? route('users.show', auth()->id()) : route('messages.create', $message->users->id) }}">{{ $message->users->id === auth()->id() ? 'You' : $message->users->username }}</a></p>
            </div>

            <div class="message-text col-12 col-md-10 my-2">
                <p>Sent at: {{ $message->created_at }}</p>
                <hr>
                <p>{{ $message->message }}</p>
            </div>
        </div>
    @endforeach
@endsection