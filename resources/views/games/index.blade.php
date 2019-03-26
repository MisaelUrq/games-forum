@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <h1>Game Forum</h1>
            <h2>The best place to talk about games.</h2>
        </div>
        @if(count($games) > 0)
            <!--TODO(Misael): Maybe tables are a bad choice? Try diferent layouts. To more detail see Bootstrap: Grid -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Director</th>
                        <th scope="col">Developer</th>
                        <th scope="col">Publisher</th>
                    </tr>
                </thead>
                @foreach($games as $game)
                    <tbody>
                        <tr>
                            <td>{{$game->name}}</td>
                            <td>{{$game->director}}</td>
                            <td>{{$game->developer}}</td>
                            <td>{{$game->publisher}}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        @else
            <p>No games have been found.</p>
        @endif
    </div>
@endsection
