<?php
include './config/autoload.php';
require_once './config/connexion.php';
include './partials/header.php';
include './partials/footer.php';

$FightsManager = new FightsManager($connexion);
$Monster = $FightsManager->randomMonster();

$HeroesManager = new HeroesManager($connexion);

if (isset($_POST['id_select_hero'])) {
    $hero = $HeroesManager->find($_POST['id_select_hero']);
}else{
    $hero = $HeroesManager->randomHero();
}

$FightsManager->fight($hero, $Monster);
// var_dump($hero);
?>

<body class="village" style="background-image: url('./assets/images/village.jpg')">

<div class="marge"></div>

<div class="d-flex flex-wrap justify-content-around combattants  container"> 
    <!-- afficher le nom + image + healthpoints du héros choisit -->
    <div class="card blurr cardd" style="width: 18rem;">
        <img class="ornement" src="/assets/images/<?= $hero->getHeroOrn() ?>">
        <img class="card-img-top perso" src="/assets/images/<?= $hero->getHeroPhoto() ?>">
        <div class="card-body">
            <p class="card-text text-center"> <i class="fa-solid fa-heart fa-2xl" style="color: #c01c28;"></i> <?= $hero->getHeroHealth_points() ?> </p>
        </div>
    </div>

   
    <!-- afficher le nom + image + healthpoints du monstre choisit -->
    <div class="card blurr cardd " style="width: 18rem;">
    <img class="ornement" src="/assets/images/<?= $Monster->getMonsterOrn() ?>">
        <img class="card-img-top perso" src="/assets/images/<?= $Monster->getMonsterPhoto()  ?>">
        <div class="card-body">
            <p class="card-text text-center"> <i class="fa-solid fa-heart fa-2xl" style="color: #c01c28;"></i> <?= $Monster->getMonsterHealth_points() ?> </p>
        </div>
    </div>
</div>