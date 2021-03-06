<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome() {
        // The values are pass with the URL after the page
        // request 'https://games-forums/welcome/var1/var2'

        // After that we can pass the variables as a hash maep
        // to the view with the 'with' metod.
        // return view('pages.welcome')->with(['nombre' => $nombre,
        //                                    'apellido' => $apellido]);

        return view('pages.welcome');
        // Or we can pass the variables with the actual name of the variable.
        // return view('pages.welcome', compac('nombre', 'apellido'));
    }
}
