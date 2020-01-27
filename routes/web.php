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
    'uses' => 'MainController@home',
    'as' => 'route_home'
]);
$router->get('/admin', [
   'uses' => 'MainController@admin',
   'as' => 'route_admin'
]);
$router->post('/admin', [
   'uses' => 'MainController@admin',
   'as' => 'route_request'
]);
//Inscription
$router->get('/signup', [
   'uses' => 'UserController@signup',
   'as' => 'route_signup'
]);
$router->post('/signup', [
   'uses' => 'UserController@signup',
   'as' => 'route_signup'
]);
// Connection authentification
$router->get('/signin', [
   'uses' => 'UserController@signin',
   'as' => 'route_signin'
]);
$router->post('/signin', [
   'uses' => 'UserController@signin',
   'as' => 'route_signin'
]);
//Deconnexion
$router->get('/logout', [
   'uses' => 'UserController@logout',
   'as' => 'route_logout'
]);
