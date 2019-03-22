<!-- Insted of making html code from 0, we can do the following things. -->

<!-- Mark that the page is part of the layouts.app view source -->
@extends('layouts.app')

<!-- After this we mark that this is the content section, so blade will move this content on the layouts.app part where we marked the content area. -->
@section('content')
    <div class="container">
        <div class="container">
            <h1>Game Forum</h1>
            <h2>The best place to talk about games.</h2>
        </div>


        
        <div class="games_preview">
            <div class="game_preview">
                <img alt="Image from a game" src=""/>
                <button class="btn-primary">First game</button>
            </div>
            <div class="game_preview">
                <img alt="Image from a game" src=""/>
                <button class="btn-primary">Second game</button>
            </div>
            <div class="game_preview">
                <img alt="Image from a game" src=""/>
                <button class="btn-primary">Third game</button>
            </div>
            <div class="game_preview">
                <img alt="Image from a game" src=""/>
                <button class="btn-primary">Fourth game</button>
            </div>
        </div>
    </div>
@endsection
