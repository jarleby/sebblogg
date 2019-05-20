@extends('layouts.layout')

@section('content')
    <div class="messages"></div>
    <form action="">
        <div class="form-group">
            <label for="message">
                Message:
            </label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
        </div>
    </form>
@endsection