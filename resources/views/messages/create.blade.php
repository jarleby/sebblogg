@extends('layouts.layout')

@section('content')
    <h1 class="text-center">Send message to {{ $user->username }}</h1>
    @if($errors->any())
        @include('layouts.error')
    @endif
    @foreach($messages as $message)
    <div class="message row my-3 mx-1 border">
        <div class="messenger col-12 col-md-2 my-2">
            <img src="https://via.placeholder.com/75" alt="profile picture" class="rounded-circle mx-auto d-block">
            <p class="text-center"><a href="{{ route('users.show', $message->users->username) }}">{{ $message->users->id === auth()->id() ? 'You' : $message->users->username }}</a></p>
        </div>

        <div class="message-text col-12 col-md-10 my-2">
            <p>Sent at: {{ $message->created_at }}</p>
            <hr>
            <p>{{ $message->message }}</p>
        </div>
    </div>
    @endforeach
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $user->id }}">
        <div class="form-group">
            <label for="message">
                Message:
            </label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Send" class="btn btn-primary">
        </div>
    </form>
@endsection