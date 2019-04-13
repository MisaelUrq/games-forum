@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <h1 class="offset-1">{{ $game->name }}</h1>
        </div>
    </div>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary">{{ $post->title }}</li>
            <li class="list-group-item">{{ $post->description }}</li>
        </ul>
    </div>
    @foreach($msgs as $msg)
    <div class="container">
        <ul class="list-group m-3">
            <li class="list-group-item list-group-item-secondary">
                {{ App\User::where('id', $msg->sender_id)->first()->name }}
                <small class="offset-10">
                    {{ $msg->post_date }}
                </small>
            </li>
            <li class="list-group-item">
                @if($msg->type === 'M')
                    <ul class="list-group m-2">
                        <li class="list-group-item ">{{ App\PublicMsg::where('id', $msg->receiver_id)->first()->content }}
                            <div class="offset-9">
                                <small>
                                    {{ App\User::where('id',
                                                       App\PublicMsg::where('id',
                                                                            $msg->receiver_id)->first()->sender_id)->first()->name }} -
                                    {{ App\PublicMsg::where('id', $msg->receiver_id)->first()->post_date }}
                                </small>
                            </div>
                        </li>
                    </ul>
                @endif
                <p>{{ $msg->content }}</p>
            </li>
        </ul>
    </div>
    @endforeach
    <div class="container mt-5">
        @if(\Auth::user() !== null)
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Message</li>
                <li class="list-group-item">
                    <form action="POST" action="">
                        <textarea class="form-control" id="" name="" rows="10"></textarea>
                        <button class="btn btn-primary mt-3 offset-11">Reply</button>
                    </form>
                </li>
            </ul>
        @else
            <h3>Login to comment.</h3>
        @endif
    </div>
@endsection
