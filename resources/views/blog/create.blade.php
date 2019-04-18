@extends('layouts.app')
@section('content')
    <div class="container">
        @component('components.logo')
        @endcomponent
        @if(\Auth::user() !== null)
            <form method="POST" action="{{ route('posts.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="post_title">Title: </label>
                    <input class="form-control" name="post_title" type="text" value=""/>
                </div>
                <div class="form-group">
                    <label for="post_description">Description:</label>
                    <input class="form-control" name="post_description" type="text" value=""/>
                </div>
                <button class="btn btn-primary m-3">Submit</button>
            </form>
        @else
            <p>You need to login to post.</p>
        @endif
    </div>
@endsection
