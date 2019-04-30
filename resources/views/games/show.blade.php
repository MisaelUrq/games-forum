@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card m-1">
            <div class="card-body">
                <h1 class="card-title ml-3">{{ $game->name }}</h1>
                <h3 class="card-subtitle text-muted">By {{ $game->director }} and {{ $game->developer }}</h3>
            </div>
        </div>
        <div class="container row">
            <div class="m-2 col">
                <div class="m-1 row">
                    <h2 class="col">Posts</h2>
                    @if(\Auth::user() !== null)
                        <button type="button" class="col-3 btn btn-primary">
                            <a style="color: white;" href="{{ route('posts.create', ['game_id' => $game->id]) }}">New post</a>
                        </button>
                    @endif
                </div>
                <div class="m-1 list-group">
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <div class="list-group-item-action list-group-item m-1">
                                <table class="container">
                                    <th class="row">
                                        <div class="col-9">
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
                    @else
                        <div class="list-group-item-action list-group-item m-1">
                            <table class="container">
                                <th class="row">
                                    <div class="col-10">
                                        <h3 class="text-wrap">
                                            No post for this game.
                                        </h3>
                                    </div>
                                </th>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col m-2">
                <div class="m-1 row">
                    <h2 class="col-9">Guides</h2>
                    @if(\Auth::user() !== null)
                        <button type="button" class="col-3 btn btn-primary">
                            <a style="color: white;" href="{{ route('guides.create', ['game_id' => $game->id]) }}">New guide</a>
                        </button>
                    @endif
                </div>
                <div class="m-1 list-group">
                    @if(count($guides) > 0)
                        @foreach($guides as $guide)
                            <div class="list-group-item-action list-group-item m-1">
                                <table class="container">
                                    <th class="row">
                                        <div class="col-8">
                                            <a href="{{ route('guides.show',
                                                              ['nothing' => 0,
                                                               'guide_id' => $guide->id,
                                                               'game_id' => $game->id]) }}">
                                                <h3 class="text-wrap">
                                                    {{ $guide->title }}
                                                </h3>
                                            </a>
                                        </div>
                                        @if(App\User::is_current_user_webadmin_or_gameadmin($game->id))
                                            <div class="col">
                                                <button type="button" class="btn btn-warning m-1"><a href="{{ route('guides.edit', $guide->id) }}">Edit</a></button>
                                                <form action="{{ route('guides.destroy', $guide->id) }}"  method="POST">
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
                    @else
                        <div class="list-group-item-action list-group-item m-1">
                            <table class="container">
                                <th class="row">
                                    <div class="col-10">
                                        <h3 class="text-wrap">
                                            No guides for this game.
                                        </h3>
                                    </div>
                                </th>
                            </table>
                        </div>
                    @endif
                </div>
                <h2 class="m-2">Reviews</h2>
                <div class="list-group m-1">
                    <h3 class="list-group-item list-group-item-action text-wrap">Review One</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
