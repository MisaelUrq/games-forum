@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <h1 class="offset-1">Game Forum</h1>
            <h3>The best place to talk about games.</h3>
        </div>
        @if(count($games) > 0)
            <!--TODO(Misael): Maybe tables are a bad choice? Try diferent layouts. To more detail see Bootstrap: Grid -->
            <div class="row">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Director</th>
                            <th scope="col">Developer</th>
                            <th scope="col">Publisher</th>
                            @if($is_user_admin)
                                <th scope="col">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($games as $game)
                            <tr>
                                <td><a href="/games/{{$game->id}}"><h3>{{$game->name}}</h3></a></td>
                                <td><a href="/games/{{$game->id}}"><h4>{{$game->director}}</h4></a></td>
                                <td><a href="/games/{{$game->id}}"><h4>{{$game->developer}}</h4></a></td>
                                <td><a href="/games/{{$game->id}}"><h4>{{$game->publisher}}</h4></a></td>
                                @if($is_user_admin)
                                    <td>
                                        <button type="button" class="btn btn-warning"><a href="{{ route('games.edit', $game->id) }}">Edit</a></button>
                                        <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                                            <input name="_method" type="hidden" value="DELETE"/>
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No games have been found.</p>
        @endif
    </div>
@endsection
