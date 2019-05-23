@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif

@while(Session::has('alert-success'))
    <div class="alert alert-success">{{ Session::remove('alert-success') }}</div>
@endwhile

@if(session('error'))
    <div class="alert alert-success">{{ session('error') }}</div>
@endif
