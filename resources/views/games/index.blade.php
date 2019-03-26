@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <h1>Game Forum</h1>
            <h2>The best place to talk about games.</h2>
        </div>
        @if(count($games) > 0)
            @foreach($games as $game)
                <h4>{{$game->name}}</h4>
            @endforeach
        @else
            <p>No games have been found.</p>
        @endif
    </div>
@endsection
