@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{ $game->name }}'s review.</h1>
                <h3>{{ $review->title }} By: {{ App\User::find($review->user_id)->name }}</h3>
            </div>
            <div class="card-body">
                <h2>{{ $review->description }}</h2>
                {{ $review->contents }}
            </div>
        </div>
    </div>
@endsection
