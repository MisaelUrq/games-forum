@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container offset-1">
            <h1 class="offset-1">{{ $game->name }}</h1>
            <h3>By {{ $game->director }} and {{ $game->developer }}</h3>
        </div>

        <h2 class="offset-1">Guides</h2>
        <div class="list-group">
            <h3 class="list-group-item list-group-item-action">Guide One</h3>
        </div>
        <h2 class="offset-1">Posts</h2>
        <div class="list-group">
            @if(count($posts))
                @foreach($posts as $post)
                    <a href="/games/{{ $game->id }}/ {{ $post->id }}">
                        <h3 class="list-group-item list-group-item-action">{{ $post->title }}</h3>
                    </a>
                @endforeach
            @endif
        </div>
        <h2 class="offset-1">Reviews</h2>
        <div class="list-group">
            <h3 class="list-group-item list-group-item-action">Review One</h3>
        </div>
    </div>
@endsection
