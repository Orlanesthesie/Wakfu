<?php

class FightsManager
{
    private $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    public function randomMonster() : Monster
    {
        $preparedRequest = $this->connexion->prepare("SELECT * FROM monsters ORDER BY RAND() LIMIT 1");
        $preparedRequest->execute();
        $randomMonster = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        // return $randomMonster;
        // var_dump($randomMonster);
        $monster = new Monster();
        $monster->setMonsterId($randomMonster['id']);
        $monster->setMonsterName($randomMonster['name']);
        $monster->setMonsterHealth_points($randomMonster['health_points']);
        $monster->setMonsterPhoto($randomMonster['photo']);
        $monster->setMonsterOrn($randomMonster['ornement']);
        return $monster;
    }

    public function fight(Hero $hero, Monster $Monster)
    {
        $result = [];
        while ($hero->getHeroHealth_points() >= 0 && $Monster->getMonsterHealth_points() >= 0) {
            $Monster->hit($hero);
            array_push($result, "Le monstre a tapé le hero");
            $hero->hit($Monster);
            array_push($result, "Le héros a tapé le monstre");
        }
    }
}
