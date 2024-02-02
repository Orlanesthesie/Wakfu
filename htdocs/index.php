<?php
include './config/autoload.php';
require_once './config/connexion.php';
include './partials/header.php';

// $HeroesManager = new HeroesManager($connexion);
// $Heroes = $HeroesManager->getHero();

?>

<body class="poire" style="background-image: url('./assets/images/poire.jpg')">

<!-- IMAGE LOGO -->
<img src="./assets/images/Wakfu_Logo.png" class="logo">


<div class="d-flex flex-wrap heros row justify-content-around mb-5">
<!-- CARTE CREER SON HEROS -->
<div class="card col-3 blur" style="width: 18rem;">
    <img class="card-img-top picto_aide" src="./assets/images/picto_aide.png" alt="Card image cap">
    <div class="card-body">
    <h5 class="card-title">Aléatoire</h5>
        <p class="card-text">
        <form action="./fight.php" method="post">
            <button class="btn btn-success bouton mt-3" type="submit">Choisir ce héros</button>
        </form>
        </p>
    </div>
</div>

<!-- CARTE SELECTIONNER UN HEROS PINPIN -->
<div class="card col-3 blur" style="width: 18rem;">
    <img class="card-img-top pinpin" src="./assets/images/tristepin.png" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Sir Tristepin</h5>
        <p class="card-text"></p>
        <form action="./fight.php" method="post">
        <input id="id_select_hero" type="hidden" name="id_select_hero" value="10">
            <button class="btn btn-success bouton ff" type="submit">Choisir ce héros</button>
        </form>
    </div>
</div>

<!-- CARTE SELECTIONNER UN HEROS EVE -->
<div class="card col-3 blur" style="width: 18rem;">
    <img class="card-img-top eve" src="./assets/images/eve.png" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Evangéline</h5>
        <p class="card-text"></p>
        <form action="./fight.php" method="post">
        <input id="id_select_hero" type="hidden" name="id_select_hero" value="11">
        <input id="name" type="hidden" name="name" value="Eve">
        <input id="health_points" type="hidden" name="health_points" value="100">
            <button class="btn btn-success bouton ff" type="submit">Choisir ce héros</button>
        </form>
    </div>
</div>

<!-- CARTE SELECTIONNER UN HEROS YUGO -->
<div class="card col-3 blur" style="width: 18rem;">
    <img class="card-img-top yugo" src="./assets/images/yugo.png" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Yugo</h5>
        <p class="card-text"></p>
        <form action="./fight.php" method="post">
        <input id="id_select_hero" type="hidden" name="id_select_hero" value="12">
            <button class="btn btn-success bouton" type="submit">Choisir ce héros</button>
        </form>
    </div>
</div>
</div>