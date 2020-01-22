<?php

namespace App\Http\Controllers;

// J'importe mes modeles
use App\Model\Videogame;

use Illuminate\Http\Request;
// J'importe la classe pour effectuer les requetes dans la DB
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
        $platformList = DB::table('platform')->get();
        dump($platformList);
        
        // dump($videogameList);
        
        return view(
            'main.home',
            [
                // 'test' => 'coucou',
                'videogameList' => $videogameList,
                'platformList' => $platformList,
            ]
        );
    }
    public function admin(Request $request) {
       // Je récupère les champs de mon formulaires d'ajout de jeu
        $name = $request->input('name');
        $editor = $request->input('editor');
        $releaseDate = $request->input('release_date');
        $platformId = $request->input('platform');
        
        // J'instancie un nouveau jeu afin d'en créer via les données reçu en request du formulaire
        $videogame = new Videogame();
        $videogame->name = $name;
        $videogame->editor = $editor;
        $videogame->release_date = $releaseDate;
        $videogame->platform_id = $platformId;


        // dump($videogame);

        //Modele Videogame herite de model
        //Je peux utiliser la methode heritée save() pour sauvegarder les données en BD

        $videogame->save();
  
        
        return view(
            'main.admin',
            [
                'test' => 'coucou',
            ]
        );
    }

}
