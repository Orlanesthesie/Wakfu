<?php

class HeroesManager {
    private $connexion;

    public function __construct($connexion){
        $this->connexion=$connexion;
    }
    
    public function randomHero(){
        $preparedRequest = $this->connexion->prepare("SELECT * FROM heroes ORDER BY RAND() LIMIT 1");
        $preparedRequest->execute();
        $randomHero = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        $hero = new Hero($randomHero['name'], $randomHero['health_points']);
        $hero->setHeroId($randomHero['id']);
        $hero->setHeroPhoto($randomHero['photo']);
        $hero->setHeroOrn($randomHero['ornement']);
        return $hero;
    }
    
    public function update($hero){
        $preparedRequest = $this->connexion->prepare("UPDATE heroes SET health_points = :health_points WHERE id = :id");
        $preparedRequest->execute([
            // GETTEUR DE HERO,
        ]);

    }
    
    public function find($id){
        $preparedRequest = $this->connexion->prepare("SELECT * from heroes WHERE heroes.id = ?");
        $preparedRequest->execute([
            $id
        ]);
        $heroData = $preparedRequest->fetch(PDO::FETCH_ASSOC);

        $hero = new Hero($heroData['name'], $heroData['health_points']);
        $hero->setHeroId($heroData['id']);
        $hero->setHeroPhoto($heroData['photo']);
        $hero->setHeroOrn($heroData['ornement']);
        return $hero;
        
    }

}
