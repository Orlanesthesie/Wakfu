<?php
include './config/autoload.php';
require_once './config/connexion.php';
include './partials/header.php';

$HeroesManager = new HeroesManager ($connexion);
$hero1 = $HeroesManager->find(10);
$hero2= $HeroesManager->find(11);
$hero3 = $HeroesManager->find(12);
?>

<body class="poire" style="background-image: url('./assets/images/poire.jpg')">

<!-- IMAGE LOGO -->
<img src="./assets/images/Wakfu_Logo.png" class="logo">

<div class="d-flex flex-wrap heros row justify-content-around mb-5">

<!-- POTIONS -->
<div class="card col-3 blur" style="width: 18rem;">
    <img class="card-img-top heal" src="./assets/images/heal.png" alt="Card image cap">
    <div class="card-body">
    <h5 class="card-title">Potions</h5>
        <p class="card-text">
            <a href="./process/heal.php" class="btn btn-success bouton mt-3 w-50" type="submit"> Soigner </a>
        </p>
    </div>
</div>

<!-- CARTE SELECTIONNER UN HEROS ALEATOIRE -->
<div class="card col-3 blur" style="width: 18rem;">
    <img class="card-img-top picto_aide" src="./assets/images/picto_aide.png" alt="Card image cap">
    <div class="card-body">
    <h5 class="card-title">Aléatoire</h5>
        <p class="card-text">
        <form action="./fight.php" method="post" class="form">
            <button type="submit" class="btn btn-success bouton mt-3" >Choisir ce héros</button>
        </form>
        </p>
    </div>
</div>

<!-- CARTE SELECTIONNER UN HEROS PINPIN -->
<div class="card col-3 blur" style="width: 18rem;">
    <img class="card-img-top pinpin" src="./assets/images/tristepin.png" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?= $hero1->getHeroName() ?></h5>
        <p class="card-text"></p>
        <div class="progress">
        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" 
        aria-valuenow="<?= $hero1->getHeroHealth_points() ?>" aria-valuemin="0" aria-valuemax="100" 
        style="width: <?= $hero1->getHeroHealth_points() ?>%"></div> 
        </div>
        <form action="./fight.php" method="post" class="form">
        <input id="id_select_hero" type="hidden" name="id_select_hero" value="10">
            <button class="btn btn-success bouton mt-2 ff" type="submit">Choisir ce héros</button>
        </form>
    </div>
</div>

<!-- CARTE SELECTIONNER UN HEROS EVE -->
<div class="card col-3 blur" style="width: 18rem;">
    <img class="card-img-top eve" src="./assets/images/eve.png" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?= $hero2->getHeroName() ?></h5>
        <p class="card-text"></p>
        <div class="progress">
        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" 
        aria-valuenow="<?= $hero2->getHeroHealth_points() ?>" aria-valuemin="0" aria-valuemax="100" 
        style="width: <?= $hero2->getHeroHealth_points() ?>%"></div> 
        </div>
        <form action="./fight.php" method="post" class="form">
        <input id="id_select_hero" type="hidden" name="id_select_hero" value="11">
        <input id="name" type="hidden" name="name" value="Eve">
        <input id="health_points" type="hidden" name="health_points" value="100">
            <button class="btn btn-success bouton mt-2 ff" type="submit">Choisir ce héros</button>
        </form>
    </div>
</div>

<!-- CARTE SELECTIONNER UN HEROS YUGO -->
<div class="card col-3 blur" style="width: 18rem;">
    <img class="card-img-top yugo" src="./assets/images/yugo.png" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?= $hero3->getHeroName() ?></h5>
        <div class="progress">
        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" 
        aria-valuenow="<?= $hero3->getHeroHealth_points() ?>" aria-valuemin="0" aria-valuemax="100" 
        style="width: <?= $hero3->getHeroHealth_points() ?>%"> </div> 
        </div>
        <p class="card-text"></p>
        <form action="./fight.php" method="post" class="form">
        <input id="id_select_hero" type="hidden" name="id_select_hero" value="12">
            <button class="btn btn-success bouton " type="submit">Choisir ce héros</button>
        </form>
    </div>
</div>
</div>

<?php
include './partials/footer.php';
?>