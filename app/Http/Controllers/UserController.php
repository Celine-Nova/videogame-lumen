<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Utils\UserSession;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
       
    }
    //Inscription
    public function signup(Request $request){
        //J'initialise mon tableau des erreurs
        $errorList = [];
        //je récupère les données du formulaire signup
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirm-password');
        
        // Si la méthode de la requête est POST
        if ($request->isMethod('post')) {
        
            //je verifie les données
            // 'trim()' Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
            $email = trim($email);
            $password = trim($password);
            $confirmPassword = trim($confirmPassword);

            //VALIDATION DES DONNEES
            if(empty($email)){

                $errorList[] = 'email vide';
                //  //Filtre : Valide une adresse de courriel
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $errorList[] = 'format de l\'email incorrect';
            }
            
            if(empty($password)){
                $errorList[] = 'Le mot de passe est requis';
            // je verifie si mon password n'est pas inférieur a 8 caracteres    
            }else if(strlen($password) < 8 ) {
                $errorList[] = 'Le mot de passe est trop court, 8 caractères minimum attendu';
            // je verifie la correspondance dut password avec celle du confirmPassword
            }else if($confirmPassword != $password){
                $errorList[] = 'Les deux mots de passe sont différents';
            }
            //si j'ai aucune erreur dans mon tableau je peux continuer la procedure d'inscription
            if(empty($errorList)){

                //je verifie grace a mon email si mon utilisateur a deja un email existant dans ma BDD
                //si tel est le cas , alors je ne peux pas creer un nouvel utilisateur avec un email semblable
                $user = User::where('email', '=', $email)->first();

                //si je recupere un user => j'ai deja quelqu'un pour cet email
                if($user){
                    $errorList[] = 'Cet email existe déjà';
                } else {

                    $newUser = new User();
                    $newUser->email = $email;
                    //avant l'insertion en BDD , je hash mon mdp avec l'algorithme bcrypt prevu par defaut
                    $newUser->password = password_hash( $password, PASSWORD_DEFAULT);

                    //j'enregistre l'utilisateur
                    $newUser->save();        
                    
                    return redirect()->route('route_signin');
                }
            }
        }

        return view('user.signup', [
            'errorList' => $errorList,
            'email' => $email
    ]);
 }
     public function signin(Request $request){
        //J'initialise mon tableau des erreurs
        $errorList = [];
        //je récupère les données du formulaire signup
        $email = $request->input('email');
        $password = $request->input('password');
       
        
        //je verifie les données
        if($request->isMethod('post')){
            // 'trim()' Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
            $email = trim($email);
            $password = trim($password);

            //VALIDATION DES DONNEES
            if(
                empty($email) || 
                filter_var($email, FILTER_VALIDATE_EMAIL) === false || //Filtre : Valide une adresse de courriel
                empty($password)
            ){
                $errorList[] = 'Identifiant ou mot de passe vide';
            }

            //Grâce à l'email je verifie si mon utilisateur existe déja dans ma BDD
            $user = User::where('email', '=', $email)->first(); //Si oui alors je peux m'authentifier

            //Si mon user existe alors je le récupèere
            
           
            if($user){
                //Je compare les mots de passe : celui hashé en CDD et celui du formulaire de connexion qui va être hashé grâce à "password_verify"
                if(password_verify($password, $user->password)){
                    // Je créée un tableau de SESSION et pour activer la SESSION il faut un "session_start" au plus tôt dans l'application ATTENTION il doit être fait après l'autoload sinon ERREUR
                    // Donc "session_start" dans le fichier boostrap/app.php
                    UserSession::connect($user);
                   
                    return redirect()->route('route_home');
                }
                } else {
                    $errorList[] = 'Identifiant ou mot de passe incorrect';
                }

        }
        return view('user.signin',
             [
                'errorList' => $errorList,
                'email' => $email
             ]
             );
     }

    //Deconnexion
    public function logout(){

        UserSession::disconnect();

        return redirect()->route('route_home');
     }
    
}
