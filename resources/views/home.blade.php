@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(App\User::is_current_user_webadmin())
                    <div class="card-header bg-warning">Dashboard</div>
                @else
                    <div class="card-header">Dashboard</div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    Your posts.
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @if(count($posts) > 0)
                                            @foreach($posts as $post)
                                                <a href="{{ url('games/'.$post->game_id.'/'.$post->id) }}">
                                                    <li class="list-group-item list-group-item-light">
                                                        <p>{{ $post->title }}</p>
                                                        <small class="d-flex justify-content-end">{{ $post->post_date }}</small>
                                                    </li>
                                                </a>
                                            @endforeach
                                        @else
                                            <li class="list-group-item">None</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card m-1">
                                <div class="card-header bg-info">Guides</div>
                                <div class="card-body">
                                    @if(count($guides) > 0)
                                        @foreach($guides as $guide)
                                            <a href="{{ url('guides/'.$guide->game_id.'/'.$guide->id) }}">
                                                <li class="list-group-item list-group-item-light">
                                                    <p>{{ $guide->title }}</p>
                                                    <small class="d-flex justify-content-end">{{ $guide->post_date }}</small>
                                                </li>
                                            </a>
                                        @endforeach
                                    @else
                                        <li class="list-group-item">None</li>
                                    @endif
                                </div>
                            </div>
                            <div class="card m-1">
                                <div class="card-header bg-info">Reviews</div>
                                <div class="card-body">
                                    @if(count($reviews) > 0)
                                        @foreach($reviews as $review)
                                            <a href="{{ url('reviews/'.$review->game_id.'/'.$review->id) }}">
                                                <li class="list-group-item list-group-item-light">
                                                    <p>{{ $review->title }}</p>
                                                    <small class="d-flex justify-content-end">{{ $review->post_date }}</small>
                                                </li>
                                            </a>
                                        @endforeach
                                    @else
                                        <li class="list-group-item">None</li>
                                    @endif
                                </div>
                            </div>
                            @if(count($admin_of_games) > 0)
                                <div class="card m-1">
                                    <div class="card-header bg-info">You are admin to this games.</div>
                                    <div class="card-body">
                                        <ul class="list-group">
                                            @foreach($admin_of_games as $games_admin)
                                                <a href="{{ url('games/'.App\Game::find($games_admin->game_id)->id) }}">
                                                    <li class="list-group-item list-group-item-light">{{ App\Game::find($games_admin->game_id)->name }}</li>
                                                </a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
