<?php
include '../config/autoload.php';
require_once '../config/connexion.php';

$HeroesManager = new HeroesManager($connexion);

$HeroesManager->heal();

$FightsManager = new FightsManager($connexion);

$FightsManager-> heal();

header("Location: ../index.php");