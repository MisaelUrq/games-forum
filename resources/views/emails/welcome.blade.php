<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Document</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Welcome to Games forums!</h2>
                <p class="card-text">We hope you enjoy your time. Please verify your email.</p>
                <form method="POST" action="{{ route('email.update', $user->id) }}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH"/>
                    <input name="user_email" type="hidden" value="{{ $user->email}}"/>
                    <input name="user_id" type="hidden" value="{{ $user->id}}"/>
                    <input name="user_name" type="hidden" value="{{ $user->name}}"/>
                    <button class="btn btn-primary">Verify Email</button>
                </form>
                    <!--
                         TODO(Misael): Implement a button to verify the user email.
                         <form action="">
                         </form>
                    -->
            </div>
        </div>
    </body>
</html>
