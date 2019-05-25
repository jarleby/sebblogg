@extends('layouts.layout')

@section('content')
    @guest
        <p class="text-center">To create or comment posts you have to <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">create an account</a>.</p>
    @endguest
    @auth
        @foreach(auth()->user()->notifications as $notification)
            {{ $notification }}
        @endforeach
    @endauth
@endsection