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

    public function find($id){
        $preparedRequest = $this->connexion->prepare("SELECT * from monsters WHERE monsters.id = ?");
        $preparedRequest->execute([
            $id
        ]);
        $MonsterData = $preparedRequest->fetch(PDO::FETCH_ASSOC);

        $monster = new Monster();
        $monster->setMonsterId($MonsterData['id']);
        $monster->setMonsterName($MonsterData['name']);
        $monster->setMonsterHealth_points($MonsterData['health_points']);
        $monster->setMonsterPhoto($MonsterData['photo']);
        $monster->setMonsterOrn($MonsterData['ornement']);
        return $monster;
        
    }

    public function fightAjax(Hero $hero, Monster $Monster)
    {
        $result = [];
        $Monster->hit($hero);
        array_push($result, "Le monstre a tapé le hero");
        // sleep(10);
        $hero->hit($Monster);
        array_push($result, "Le héros a tapé le monstre");

        return $result;
    }

    public function update($Monster){
        $preparedRequest = $this->connexion->prepare("UPDATE monsters SET health_points = ? WHERE monsters.id = ? ");
        $preparedRequest->execute([
            $Monster->getMonsterHealth_points(),
            $Monster->getMonsterId()
        ]);
        $Monster_update = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $Monster_update;
    }

    public function heal(){
        $preparedRequest = $this->connexion->prepare("UPDATE monsters SET health_points = 100");
        $preparedRequest->execute();
        $heal = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $heal;
    }
}
