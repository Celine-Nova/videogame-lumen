<?php

namespace App\Http\Controllers;

use App\Videogame;
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
        $videogameList = DB::table('videogame')->get();
        
        // dump($videogames);
        
        return view(
            'home',
            [
                // 'test' => 'coucou',
                'videogameList' => $videogameList,
            ]
        );
    }
    public function admin(Request $Request) {
        $request = $request->all();
       
        dump($request);
  
        
        return view(
            'admin',
            [
                'test' => 'coucou',
            ]
        );
    }

}
