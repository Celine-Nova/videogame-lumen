<?php
namespace App\Utils;

use App\Model\User;

//Gérer et manipuler la session de l'utilisateur
abstract class UserSession {
    //je créée une constante (qui ne chagera jamais) pour rendre dynamique les données dans mes functions
    //ici la clé de mon tableau SESSION où est stocké le user
    const SESSION_USER_NAME = 'currentUser';
    
    //je defini les roles
    const ROLE_ADMIN = 1;
    const ROLE_USER =2;



    //Je connecte mon utilisateur
    // Avec le type int  'User' je force mon objet à recevoir du type 'User'
    public static function connect(User $user){
        //Je stocke mon '$user' dans ma SESSION
        $_SESSION[self::SESSION_USER_NAME] = $user;
        //"self" fait appel à ma variable constante
    }

    //Je deconnecte mon utilisateur
    public static function disconnect(){
        unset($_SESSION[self::SESSION_USER_NAME]);

        return true;
    }

    //Je vérifie que mon utilisateur est bien connecté
    public static function isConnected(){
        return isset($_SESSION[self::SESSION_USER_NAME]);
    }

    //Si mon utilsateur est connecté je le récupère
    public static function getUser(){
        if(self::isConnected()){
            //je retourne ma SESSION
            return $_SESSION[self::SESSION_USER_NAME];
        } //sinon retourne false

        return false;

    }

    //Je recuère l'Id du rôle de mon utilsateur
    public static function getROleId(){
        if(self::isConnected()){
            return self::getUser()->role_id;
        }
        return null;
    }

    //Je vérifie si mon utilsateur est un Administrateur ou non 
    public static function isAdmin(){
        return self::getROleId() == self::ROLE_ADMIN;
    }
}