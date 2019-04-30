@extends('layouts.app')
@section('content')
    <div class="container">
        @component('components.logo')
        @endcomponent
        @if(isset($guide))
            <form action="{{ route('guides.update', $guide->id) }}" method="POST">
                <input name="_method" type="hidden" value="PATCH"/>
        @else
                <form method="POST" action="{{ route('guides.store') }}">
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="guide-title">Title: </label>
            <input class="form-control" name="guide-title" type="text" value="{{ isset($guide) ? $guide->title : '' }}"/>
        </div>
        <div class="form-group">
            <label for="guide-description">Description: </label>
            <input class="form-control" name="guide-description" type="text" value="{{ isset($guide) ? $guide->description : '' }}"/>
        </div>
        <div class="form-group" id="message-div">
            <label for="guide-contents">Contentsgam: </label>
            <textarea class="form-control" name="guide-contents" rows="10" value="{{ isset($guide) ? $guide->contents : '' }}"></textarea>
        </div>
        <input name="game_id" type="hidden" value="{{ $game->id }}"/>
        <button class="btn btn-primary">Submit</button>
                </form>
    </div>
@endsection
