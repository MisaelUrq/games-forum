<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Document</title>
    </head>
    <body>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Welcome to Games forums!</h2>
                <p class="card-text">We hope you enjoy your time. Please verify your email.</p>
                <form method="GET" action="{{ action('MailController@update', $user->name) }}">
                    {{ csrf_field() }}
                    <input name="user_email" type="hidden" value="{{ $user->email}}"/>
                    <input name="user_id" type="hidden" value="{{ $user->id}}"/>
                    <input name="user_name" type="hidden" value="{{ $user->name}}"/>
                    <button class="btn btn-primary">Verify Email</button>
                </form>
            </div>
        </div>
    </body>
</html>
