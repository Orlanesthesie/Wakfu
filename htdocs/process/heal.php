<?php
include '../config/autoload.php';
require_once '../config/connexion.php';

$HeroesManager = new HeroesManager($connexion);

$HeroesManager->heal();

header("Location: ../index.php");