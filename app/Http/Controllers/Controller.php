<?php

namespace App\Http\Controllers;

// j'appelle la façade pour utilser la classe 'view::'

use App\Utils\UserSession;
use Illuminate\Support\Facades\View;
use Laravel\Lumen\Routing\Controller as BaseController;

/* 
* Cette Classe est le parente de mes enfants Controller : "mMainControllrt UserController..."
* Ses enfants Controller heriteront du comportement de leur parent
*/
class Controller extends BaseController
{
    /* je souhaite partager des données de mes Controllers avec toutes les vues 
    * Que les methodes de mes classes soient accessibles dans mes vues
    *cf https://laravel.com/docs/6.x/views#sharing-data-with-all-views
    */
    public function __construct(){
        View::share('isConnected', UserSession::isConnected());
        View::share('currentUser', UserSession::getUser());
        View::share('isAdmin', UserSession::isAdmin());
    }

    //Gérer les droits d'accès à une page ici('Admin') formulaire d'ajout de jeu
    public function userAllowed(){
        //L'utilsateur est-il connecté?
        //si pas connecté erreur 401
        if(!UserSession::isConnected()){
            abort(401,'Vous devez vous connecter');
        }

        //L'utilisateur connecté est-il un Admin, erreur 403 => droit
        if (!UserSession::isAdmin()){
            abort(403, 'Vous n\'avez pas les droits pour acceder à cette page');
        }
    }
}
