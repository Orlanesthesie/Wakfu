<?php
include './config/autoload.php';
require_once './config/connexion.php';
include './partials/header.php';

$HeroesManager = new HeroesManager($connexion);
$hero = $HeroesManager->findAlive();

?> 
<body class="clairiere" style="background-image: url('./assets/images/clairiere.jpg')">

<!-- IMAGE VICTOIRE -->
<img src="./assets/images/victoire_1.png">

<?php foreach ($hero as $survivor => $valeur) { ?>

<div class="d-flex flex-wrap row justify-content-around mb-5">
 <div class="card blurr cardd" style="width: 18rem;">
      <img class="card-img-top perso" src="/assets/images/<?= $valeur->getHeroPhoto() ?>">
      <div class="card-body">
      </div>   
</div>
<?php }?>

         

<?php
include './partials/footer.php';
?>