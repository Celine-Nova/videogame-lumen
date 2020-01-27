    <!-- je factorise le HTML ici header -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Jeux vidéos</title>
  </head>
  <body>
  <main class="container">
   <!-- test navbar bouton séparé  -->
   
      <div class="d-flex bd-highlight mb-3">
          <div class="mr-auto p-2 bd-highlight"><a class="btn btn-link" href="<?= route('route_home') ?>">Accueil</a></div>
          <!-- Grâce aux façades que j'ai parametré dans le construct de mon Controller.php parent j'ai partager les données de mes Controller enfants dont je souhaite avoir accès dans mes vues 
          AVANT j'utilisais  'if (isset($_SESSION['currentUser']'
          MAINTENANT je peux utiliser la methode  'isConnected de ma classe UserSession" cf "View::share" -->
          <?php if($isConnected)
          {
          ?> 
            <div class="p-2 bd-highlight"><a class="btn btn-warning" href="<?= route('route_logout') ?>">Deconnexion</a></div>
          <?php
          } else
          {
          ?>
            <div class="p-2 bd-highlight"><a class="btn btn-primary" href="<?= route('route_signup') ?>">Inscription</a></div>
            <div class="p-2 bd-highlight"><a class="btn btn-info" href="<?= route('route_signin') ?>">Connexion</a></div>
          <?php
          }; 
          ?>
    </div>

    <div class="jumbotron">
        <h1 class="display-4">Mes jeux vidéos</h1>
            <p class="lead">Voici une petite interface toute simple (grâce à bootstrap) permettant de visualiser les jeux vidéos de ma base de données, mais aussi de les ajouter  !</p>
    </div>