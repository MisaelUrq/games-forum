@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <h1>Game Forum</h1>
            <h2>The best place to talk about games.</h2>
        </div>
        @if($is_admin !== null && $is_admin->id > 0)
            <div class="form-group">
                <input class="form-control" name="" type="text" value=""/>
                <form method="POST" action="/games">

                </form>
            </div>
        @else
            <p>You can't create games, contact a web admin if you want a new game to be added to the page.</p>
        @endif
    </div>
@endsection
