 <!-- Lorsque je pase une variable sous forme de tableau associatif

     clef valeur dans ma fonction view(), ces clef seront automatiquement transformées en variable dans les fichiers de vue -->

<h1>Bonjour <?= $super_name_nova ?> </h1>

<p> Youupiii <?= $test ?></p>

<p>
     <!-- la fonction route() est une fonction issue du helper qui va me generer l'url réel de ma route a partir de son nom -->
    Retour à <a href="<?= route("nom_de_route_index") ?>"> l'index </a>
</p>

<p>
     Le chiffre passé en parametre est : <?= $chiffre ?>
</p>
