<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*
 L'appel à une route via l'objet $router se fait comme ceci
 - j'exprime la methode HTTP attendue a appeler via ->get, >post,->put, ->patch...
 - je passe en premier parametre de ma fonction l'url attendu dans mon navigateur sur laquelle je souhaite matcher
 - je passe en second parametre le code que je veux executer sur ce matching => fonction, appel de vue <--- pas tres propre OU la definition de l'appel a mon controller
*/
// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });


// $router->get('/', function () use ($router) {
//
//     return 'Hello world';
//  });
 $router->get('/', [
    'uses' => 'MainController@index',
    'as' => 'nom_de_route_index'
]);


//je peux aussi genérer du code HTML directement en retour du routing
// $router->get('/toto-route', function () use ($router) {

//     return '<h1> Hello Toto </h1>';

// });

// $router->get('/toto-route', function () use ($router) {
// /*
//      Dans lumen, la fonction "view()" va automatiquement chercher les vue dans le dossier reservé a cet effet qui est "resources/views"
//
//      De ce fait et dans mon cas, le framework ira chercher aumtomatiquement les bonnes vue au bon endroit
//
//      NOTE : l'appel au vue s'effectue SANS l'extension php ou autre ( pas de mavuetoto.php)
//     */
//     return view(
//         'mavuetoto',
//         [
//             'super_name_nova' => 'Toto le grand',
//             'test'=> 'youpi une deuxieme variable'
//         ]
//     );
// });

// $router->get('/toto', 'MainController@toto');

$router->get('/toto', [
    'uses' => 'MainController@toto', // la clef associative "uses" permet de definir le controller + methode a associer à la route "/toto"
    'as' => 'nom_de_route_toto' // la clef associative "as" permet de definir un nom de route notamment pour la génération des liens dans une page <3
]);
