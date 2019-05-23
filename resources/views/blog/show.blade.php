@extends('layouts.app')
@section('content')
    <script>
     function ToggleTextArea(key) {
         var form_block = document.getElementById("reply_to_user-"+key);
         if (form_block.style.display === "none") {
             form_block.style.display = "block";

             var button = document.getElementById("button_reply"+key);
             button.value = "Cancel";
             button.style.background = "red";
         } else {
             form_block.style.display = "none";
             var button = document.getElementById("button_reply"+key);
             button.value = "Reply";
             button.style.background = "#3490dc";
         }
     }
    </script>
    <div class="container">
        <div class="container">
            <a class="row" href="{{ url('games/'.$game->id) }}">
                <h1 class="offset-1">{{ $game->name }}</h1>
                <!-- <img class="offset-1" alt="no image" src=""/> -->
            </a>
        </div>
    </div>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary">{{ $post->title }} <small class="offset-7">By: <a href="#">{{ App\User::find($post->user_id)->name }}</a> on {{ $post->post_date }}</small></li>
            <li class="list-group-item">{{ $post->description }}</li>
        </ul>
    </div>
    @foreach($msgs as $msg)
        <div class="container">
            <ul class="list-group m-3">
                <li class="list-group-item list-group-item-secondary">
                    <div class="row">
                        <p class="m-2"><a href="#">{{ App\User::where('id', $msg->sender_id)->first()->name }}</a></p>
                        <small class="offset-9">
                            {{ $msg->post_date }}
                        </small>
                        @if($is_user_admin)
                            <form class="ml-4" action="{{ route('publicmsg.destroy', $msg->id) }}" method="POST">
                                <input name="_method" type="hidden" value="DELETE"/>
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif
                    </div>
                    <div class="row offset-9">
                        @if(App\User::is_current_user_webadmin_or_gameadmin($game->id) && App\User::where('id', $msg->sender_id)->first()->id !== \Auth::user()->id)
                            <button class="btn btn-info btn-sm m-1">Make GameAdmin</button>
                        @endif
                        @if(App\User::is_current_user_webadmin() && App\User::where('id', $msg->sender_id)->first()->id !== \Auth::user()->id)
                            <button class="btn btn-info btn-sm m-1">Make WebAdmin</button>
                        @endif
                    </div>
                </li>
                <li class="list-group-item">
                    @if($msg->type === 'M')
                        <ul class="list-group m-2">
                            <li class="list-group-item ">
                                @if(App\Publicmsg::get_receiver_msg_from_response_msg($msg) !== null)
                                    {{ App\PublicMsg::get_receiver_msg_from_response_msg($msg)->content }}
                                    <div class="offset-9">
                                        <small>
                                            From: {{ App\PublicMsg::get_receiver_user_from_response_msg($msg)->name }} on
                                            {{ App\PublicMsg::get_receiver_msg_from_response_msg($msg)->post_date }}
                                        </small>
                                    </div>
                                @else
                                    This message was deleted.
                                @endif
                            </li>
                        </ul>
                    @endif
                    <p>{{ $msg->content }}</p>
                    @if(\Auth::user() !== null)
                        <form id="{{ 'form_div' . $msg->key }}" method="POST" action="{{ route('publicmsg.store') }}">
                            {{ csrf_field() }}
                            <div id="{{'reply_to_user-' . $msg->key }}" class="form-group" style="display: none;">
                                <textarea class="form-control" name="content" rows="3"></textarea>
                                <input name="type_of_reply" type="hidden" value="M"/>
                                <input name="post_id" type="hidden" value="{{ $post->id }}"/>
                                <input name="receiver_id" type="hidden" value="{{ $msg->id }}"/>
                                <button class="btn btn-primary mt-1 offset-11">Submit</button>
                            </div>
                        </form>
                        <input id="{{ 'button_reply' . $msg->key }}" class="btn btn-primary btn-sm offset-11" name="replyClickMe" type="button" value="Reply" onClick="{{'ToggleTextArea("' . $msg->key . '");'}}" />
                    @endif
                </li>
            </ul>
        </div>
    @endforeach
    <div class="container mt-5">
        @if(\Auth::user() !== null)
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Message</li>
                <li class="list-group-item">
                    <form method="POST" action="{{ route('publicmsg.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="form-control" name="content" rows="10"></textarea>
                            <input name="type_of_reply" type="hidden" value="P"/>
                            <input name="post_id" type="hidden" value="{{ $post->id }}"/>
                        </div>
                        <button class="btn btn-primary mt-3 offset-11 btn-sm">Reply</button>
                    </form>
                </li>
            </ul>
        @else
            <h3>Login to comment.</h3>
        @endif
    </div>
@endsection
