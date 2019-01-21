<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index() {
        return 'Hello world';
    }
     // ancienne preconisation (dépréciee) : rajouter le suffix action dans le nom de la methode ex totoAction()...
     //le type de la variable $request ne sera ni un string, ni un tableau mais une request
    public function toto(Request $request) {
        //dd = dump die
        //dd($request);
        /*
         grace à l'objet request directement instancié par Lumen
         je peux récupérer directement et sans distinction ce qui est passé en POST ou en GET => on oublie le $_GET / $_POST ;)
        */
        $chiffre = $request->input('chiffre', 'valeur_par_defaut_du_parametre');
        dump($chiffre);
        // rappel : ma clef chiffre va automatiquement est convertie en variable $chiffre arrivé dans ma vue
        return view(
                'mavuetoto',
                [
                    'super_name_nova' => 'Toto le grand',
                    'test'=> 'youpi une deuxieme variable',
                    'chiffre'=> $chiffre
                ]
        );
    }
}
