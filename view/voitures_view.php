<?php
$title = 'Accueil';
include_once 'parts/head.php';
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container text-white text-center">
            <h1>Bienvenue sur <u>Centre Auto</u></h1>
            <h2 class="display-4">Votre solution pour acheter une voiture.</h2>
            <p>Nous listons pour vous l'ensemble de nos voitures disponibles. Vous pouvez également rajouter votre propre voiture si vous voulez la vendre !</p>
        </div>
    </div>
    <div class="container">
        <h2>Nos voitures</h2>
        <a href="index.php?controller=voiture&action=add" class="btn btn-secondary mb-2">Ajouter une voiture</a>
        <?php include_once 'parts/tab_voitures.php'; ?>
    </div>

<?php
include_once 'parts/foot.php';
