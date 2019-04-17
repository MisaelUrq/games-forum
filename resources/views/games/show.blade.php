@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card m-1">
            <div class="card-body">
                <h1 class="card-title ml-3">{{ $game->name }}</h1>
                <h3 class="card-subtitle text-muted">By {{ $game->director }} and {{ $game->developer }}</h3>
            </div>
        </div>
        <h2 class="m-4">Guides</h2>
        <div class="m-3 list-group">
            <h3 class="list-group-item list-group-item-action text-wrap">Guide One</h3>
        </div>
        <h2 class="m-4">Posts</h2>
        <div class="m-3 list-group">
            @if(count($posts))
                @foreach($posts as $post)
                    <a class="mb-1" href="{{ url('/games/'.$game->id.'/'.$post->id) }}">
                        <h3 class="list-group-item list-group-item-action text-wrap">{{ $post->title }}</h3>
                    </a>
                @endforeach
            @endif
        </div>
        <h2 class="m-4">Reviews</h2>
        <div class="list-group m-3">
            <h3 class="list-group-item list-group-item-action text-wrap">Review One</h3>
        </div>
    </div>
@endsection
