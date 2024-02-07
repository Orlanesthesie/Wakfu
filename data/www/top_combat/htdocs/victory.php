<?php
include './config/autoload.php';
require_once './config/connexion.php';
include './partials/header.php';

$HeroesManager = new HeroesManager($connexion);
$hero = $HeroesManager->findAlive();

?> 
<audio autoplay loop>
  <source src="./assets/son/Victoire.mp3" type="audio/mp3">
</audio>
<body class="clairiere" style="background-image: url('./assets/images/clairiere.jpg')">
<img src="./assets//images/poufpouf.gif" class="pouf">

<!-- IMAGE VICTOIRE -->
<div class="container">
<img src="./assets/images/victoire_1.png" class="vic">
</div>


<div class="d-flex flex-wrap row justify-content-around mb-5">
      <?php foreach ($hero as $survivor => $valeur) { ?>
 <div class="card blurr cardd" style="width: 18rem;">
      <img class="card-img-top perso" src="/assets/images/<?= $valeur->getHeroPhoto() ?>">
      <div class="card-body">
      </div>   
</div>
<?php }?>

         

<?php
include './partials/footer.php';
?>