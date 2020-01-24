<?= view('layout/header') ?>
<h1>&#x26a0; Page en cours de construction &#x1F6A7; </h1>

<form action="" method="POST" novalidate="novalidate"> <!-- novalidate desactive la validation automatique du navigateur-->

  <div class="form-group">
    <label for="email">Adresse email</label>
    <!-- ATTENTION : ne pas oublier de rajouter l'attribut name sur chaque input -->
    <input type="text" class="form-control" id="email" name="email" value="" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
  </div>
  <button type="submit" class="btn btn-success">Inscription</button>
</form>

<?= view('layout/footer') ?>