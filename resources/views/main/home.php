<!-- j'inclus le layout header -->
<!--ici le . est égal au slash / (layout/footer) -->

<!-- #Raccourci de php echo 
en remplaçant le php echo par un egal (?=)-->

<?= view( 'layout.header' ) ?>
<!-- Autre possibilité je peux utiliser la fonction view que je l'utiliserai sur la page admin -->
    <div>
            <a href = " <?= route('route_admin') ?> " class=" btn btn-danger" > Administrateur </a>
    </div>

<h1></h1>
<div class="row">
    <div class="col-12 col-md-8">
        <a href="<?= route('route_home') ?>/?order=name" class="btn btn-primary">Trier par nom</a>&nbsp;
        <a href="index.php?order=editor" class="btn btn-info">Trier par éditeur</a>&nbsp;
        <!-- N'afficher ce bouton que s'il y a un tri -->
                
        <a href="index.php" class="btn btn-dark">Annuler le tri</a><br>
        
      
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">&Eacute;diteur</th>
                    <th scope="col">Date de sortie</th>
                    <th scope="col">Console / Support</th>
                </tr>
            </thead>
            <tbody>
                <!--Je boucle sur le tableau $videogameList contenant tous les jeux vidéos -->
                <?php foreach ($videogameList as $game)
                {
                    
                    ?>
                <tr>
                    <td><?= $game->id;?></td>
                    <td><?= $game->name;?></td>
                    <td><?= $game->editor;?></td>
                    <td><?= $game->release_date;?></td>
                    <td>
                    <?php 
                    $platform = $platformList->firstWhere('id', $game->platform_id);
                    echo $platform->name;
                    ?>
                    </td>
                </tr>
                <?php
                }
                ?>
        
            </tbody>
        </table>
    </div>
    <!-- j'inclus le template header -->             
    <?= view( 'layout.footer' ) ?>
    
