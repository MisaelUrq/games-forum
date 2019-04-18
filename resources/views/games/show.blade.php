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
        <div class="m-4 row">
            <h2>Posts</h2>
            @if(\Auth::user() !== null)
                <button type="button" class="btn btn-primary offset-9">
                    <a style="color: white;" href="{{ route('posts.create', ['game_id' => $game->id]) }}">New post</a>
                </button>
            @endif
        </div>
        <div class="m-3 list-group">
            @if(count($posts))
                @foreach($posts as $post)
                    <div class="list-group-item-action list-group-item m-1">
                        <table class="container">
                            <th class="row">
                                <div class="col-10">
                                    <a href="{{ url('/games/'.$game->id.'/'.$post->id) }}">
                                        <h3 class="text-wrap">
                                            {{ $post->title }}
                                        </h3>
                                    </a>
                                </div>
                                @if(App\User::is_current_user_webadmin_or_gameadmin($game->id))
                                    <div class="col">
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            <input name="_method" type="hidden" value="DELETE"/>
                                            @csrf
                                            <button type="submit" class="btn btn-danger m-1">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </th>
                        </table>
                    </div>
                @endforeach
            @endif
        </div>
        <h2 class="m-4">Reviews</h2>
        <div class="list-group m-3">
            <h3 class="list-group-item list-group-item-action text-wrap">Review One</h3>
        </div>
    </div>
@endsection
