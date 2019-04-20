@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{ $game->name }}'s guide.</h1>
                <h3>{{ $guide->title }} By: {{ App\User::find($guide->user_id)->name }}</h3>
            </div>
            <div class="card-body">
                <h2>{{ $guide->description }}</h2>
                {{ $guide->contents }}
            </div>
        </div>
    </div>
@endsection
