@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <h1 class="offset-1">{{ $game->name }}</h1>
        </div>
    </div>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary">{{ $post->title }}</li>
            <li class="list-group-item">{{ $post->description }}</li>
        </ul>
    </div>
    <div class="container mt-5">
        @if(\Auth::user() !== null)
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Message</li>
                <li class="list-group-item">
                    <form action="POST" action="">
                        <textarea class="form-control" id="" name="" rows="10"></textarea>
                        <button class="btn btn-primary mt-3 offset-11">Reply</button>
                    </form>
                </li>
            </ul>
        @endif
    </div>
@endsection
