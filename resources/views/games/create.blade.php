@extends('layouts.app')
@section('content')
    <div class="container">
        @component('components.logo')
        @endcomponent
        @if($is_user_admin)
            @if(isset($game))
                <form action="{{ route('games.update', $game->id) }}" method="POST">
                    <input name="_method" type="hidden" value="PATCH"/>
            @else
                <form method="POST" action="{{ route('games.store') }}">
            @endif
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input class="form-control" name="title" type="text" value="{{ isset($game) ? $game->name : '' }}"/>
                </div>
                <div class="form-group">
                    <label for="director">Director: </label>
                    <input class="form-control" name="director" type="text" value="{{ isset($game) ? $game->director : '' }}"/>
                </div>
                <div class="form-group">
                    <label for="developer">Developer: </label>
                    <input class="form-control" name="developer" type="text" value="{{ isset($game) ? $game->developer : '' }}"/>
                </div>
                <div class="form-group">
                    <label for="publisher">Publisher: </label>
                    <input class="form-control" name="publisher" type="text" value="{{ isset($game) ? $game->publisher : '' }}"/>
                </div>
                <div class="form-group">
                    <label for="release_date">Release date: </label>
                    <input class="form-control" name="release_date" type="date" value="{{ isset($game) ? $game->launch_date : '' }}"/>
                </div>
                <div class="form-group">
                    <label>Platforms: </label>
                    <!--TODO(Misael): Platforms need to be from a checkbox! The values define somewhere else, maybe a controller? -->
                    <div class="form-group">
                        <input name="platform_test4" type="checkbox" for="platforms_test4">
                        <label name="platforms_test4">Test 4</label>
                    </div>
                    <div class="form-group">
                        <input name="platform_testone" type="checkbox" for="platforms_testone">
                        <label name="platforms_testone">Test One</label>
                    </div>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        @else
            <p>You can't create games, contact a web admin if you want a new game to be added to the page.</p>
        @endif
    </div>
@endsection
