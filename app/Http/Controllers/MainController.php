<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function home() {
        $videogames = DB::table('videogame')->get();
        // dump($videogames);
        
        return view(
            'home',
            [
                // 'test' => 'coucou',
                'videogames' => $videogames,
            ]
        );
    }
    public function admin() {
        return view(
            'admin',
            [
                'test' => 'coucou',
            ]
        );
    }

}
