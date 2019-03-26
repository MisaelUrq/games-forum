@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <h1>Game Forum</h1>
            <h2>The best place to talk about games.</h2>
        </div>
        @if($is_admin !== null && $is_admin->id > 0)

            <form method="POST" action="{{route('games.store')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input class="form-control" name="title" type="text" value=""/>
                </div>
                <div class="form-group">
                    <label for="title">Director: </label>
                    <input class="form-control" name="director" type="text" value=""/>
                </div>
                <div class="form-group">
                    <label for="title">Developer: </label>
                    <input class="form-control" name="developer" type="text" value=""/>
                </div>
                <div class="form-group">
                    <label for="title">Publisher: </label>
                    <input class="form-control" name="publisher" type="text" value=""/>
                </div>
                <div class="form-group">
                    <label for="title">Release date: </label>
                    <input class="form-control" name="release_date" type="date" value=""/>
                </div>
                <div class="form-group">
                    <label for="title">Platforms: </label>
                    <!--TODO(Misael): Platforms need to be from a checkbox! The values define somewhere else, maybe a controller? -->
                    <div class="form-group">
                        <input name="platforms_test4" type="checkbox" for="test4">
                        <label id="test4">Test 4</label>
                    </div>
                    <div class="form-group">
                        <input name="platforms_test_one" type="checkbox" for="test one">
                        <label id="test one">Test One</label>
                    </div>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        @else
            <p>You can't create games, contact a web admin if you want a new game to be added to the page.</p>
        @endif
    </div>
@endsection
