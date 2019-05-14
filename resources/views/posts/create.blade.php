@extends('layouts.layout')

@section('content')
    <h1>Create Post</h1>
    @include('layouts.error')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">
                Title:
            </label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="body">
                Text:
            </label>
            <textarea name="body" id="body" class="form-control" cols="30" rows="10" required>{{ old('body') }}</textarea>
        </div>
        <input type="submit" value="Create Post" class="btn btn-primary">
    </form>
@endsection