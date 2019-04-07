@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <h1 class="offset-1">{{ $game->name }}</h1>
            <h3>By {{ $game->director }} and {{ $game->developer }}</h3>
        </div>
    </div>
@endsection
