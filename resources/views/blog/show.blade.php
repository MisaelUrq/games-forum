@extends('layouts.app')
@section('content')
    <script>
     function InsertTextArea(key) {
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
                    <div class="offset-10 row">
                        <small>
                            {{ $msg->post_date }}
                        </small>
                        @if($is_user_admin)
                            <form class="ml-4" action="{{ route('publicmsg.destroy', $msg->id) }}" method="POST">
                                <input name="_method" type="hidden" value="DELETE"/>
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </div>
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
                        <input id="{{ 'button_reply' . $msg->key }}" class="btn btn-primary offset-11" name="replyClickMe" type="button" value="Reply" onClick="{{'InsertTextArea("' . $msg->key . '");'}}" />
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
                        <button class="btn btn-primary mt-3 offset-11">Reply</button>
                    </form>
                </li>
            </ul>
        @else
            <h3>Login to comment.</h3>
        @endif
    </div>
@endsection
