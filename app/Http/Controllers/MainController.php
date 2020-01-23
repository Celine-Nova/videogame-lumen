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
    public function home(Request $request) {
        //Pour effectuer mon filtre sur mes données , je recupere la valeur du parametre passé en GET dans mon url qui se nomme "order"
        $orderType = $request->input('order', null); //je prevois une valeur nulle par defaut si pas de tri

        //Je récupère la liste des platform : cf https://laravel.com/docs/5.8/queries
            $platformList = DB::table('platform')->get();
            //dump($platformList);

            //Si 'orderType' est nul alors je recupère ma liste de videogame
            if(is_null($orderType)){
                
                $videogameList = DB::table('videogame')->get();
                //dump($videogameList);
            } else {
                // sinon je tri les champs donnés en paramètre de l'Url
                $videogameList = Videogame::orderBy($orderType, 'asc')->get();

            }
        
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
            // Autre possibilité gérer les clés étrangère via Eloquent et les relations dans les modeles
            $videogame->platform_id = $platformId;

            //Modele Videogame herite de model
            //Je peux utiliser la methode heritée save() pour sauvegarder les données en BD
            $videogame->save();
            
            //après l'envoi du formulaire je redirige vers la route home
            return redirect()->route('route_home');
        }
        
        return view(
            'main.admin',
            [
                'platformList' => $platformList,
            ]
        );
    }

}
