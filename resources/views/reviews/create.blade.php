
@extends('layouts.app')
@section('content')
    <div class="container">
        @component('components.logo')
        @endcomponent
        @if(isset($review))
            <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                <input name="_method" type="hidden" value="PATCH"/>
        @else
                <form method="POST" action="{{ route('reviews.store') }}">
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="review-title">Title: </label>
            <input class="form-control" name="review-title" type="text" value="{{ isset($review) ? $review->title : '' }}"/>
        </div>
        <div class="form-group">
            <label for="review-description">Description: </label>
            <input class="form-control" name="review-description" type="text" value="{{ isset($review) ? $review->description : '' }}"/>
        </div>
        <div class="form-group" id="message-div">
            <label for="review-contents">Contents: </label>
            <textarea class="form-control" name="review-contents" rows="10">{{ isset($review) ? $review->contents : '' }}</textarea>
        </div>
        <input name="game_id" type="hidden" value="{{ $game->id }}"/>
        <button class="btn btn-primary">Submit</button>
                </form>
    </div>
@endsection
