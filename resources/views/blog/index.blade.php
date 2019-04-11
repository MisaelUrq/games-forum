@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <h1 class="offset-1">Game Forum</h1>
            <h3>The best place to talk about games.</h3>
        </div>
        @if(count($posts) > 0)
            <p>{{ $posts->id }}</p>
        @else
            <p>No post found.</p>
        @endif
    </div>
@endsection

