@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    Your posts.
                                </div>
                                <div class="card-body">
                                    @foreach($posts as $post)
                                        <ul class="list-group">
                                            <a href="{{ url('games/'.$post->game_id.'/'.$post->id) }}">
                                                <li class="list-group-item list-group-item-light">
                                                    <p>{{ $post->title }}</p>
                                                    <small class="d-flex justify-content-end">{{ $post->post_date }}</small>
                                                </li>
                                            </a>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card m-1">
                                <div class="card-header">Guides</div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">None</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card m-1">
                                <div class="card-header">Reviews</div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">None</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
