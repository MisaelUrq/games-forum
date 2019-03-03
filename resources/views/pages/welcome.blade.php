<!-- Insted of making html code from 0, we can do the following things. -->

<!-- Mark that the page is part of the layouts.app view source -->
@extends('layouts.app')

<!-- After this we mark that this is the content section, so blade will move this content on the layouts.app part where we marked the content area. -->
@section('content')
    <div>
        <h1>Welcome</h1>
        <p>¿Como estás {{$nombre}} {{$apellido}}?</p>
    </div>
@endsection
