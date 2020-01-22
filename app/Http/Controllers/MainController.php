<?php

namespace App\Http\Controllers;

// J'importe mes modeles

use App\Model\Platform;
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
        //Je récupère la liste des videogmae et des platform : cf https://laravel.com/docs/5.8/queries
        $videogameList = DB::table('videogame')->get();
        $platformList = DB::table('platform')->get();
        //dump($platformList);
        //dump($videogameList);
        
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
        //je recupere la liste des platform avec ORM eloquent cf : https://laravel.com/docs/5.8/eloquent
        $platformList = Platform::all();
        // dump($platformList);
       // Je récupère les champs de mon formulaires d'ajout de jeu
        $name = $request->input('name');
        $editor = $request->input('editor');
        $releaseDate = $request->input('release_date');
        $platformId = $request->input('platform');
        
        // si methode POST = envoi de formulaire et enregistrement en DB sinon en arrivant sur la page pour la 1ere fois le formulaire est vide et affiche une erreur
        if ($request->isMethod('post')) {
            // J'instancie un nouveau jeu afin d'en créer via les données reçu en request du formulaire d'ajout
            $videogame = new Videogame();
            $videogame->name = $name;
            $videogame->editor = $editor;
            $videogame->release_date = $releaseDate;
            // Gràce mon 'option value' dans mon formulaire je peux reucpérer mon 'plaform_id'
            $videogame->platform_id = $platformId;

            //Modele Videogame herite de model
            //Je peux utiliser la methode heritée save() pour sauvegarder les données en BD

            $videogame->save();
        }
        
        return view(
            'main.admin',
            [
                'platformList' => $platformList,
            ]
        );
    }

}
