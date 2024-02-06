// document.addEventListener('DOMContentLoaded',   function(){

//     let hero_id = document.querySelector('input[name="hero_id"]').value
//     let monster_id = document.querySelector('input[name="monster_id"]').value

// async function timer(){

//     let formData = new FormData();

//     formData.append('hero_id', hero_id)
//     formData.append('monster_id', monster_id)


//     let response = await fetch('./process/process_fight.php', {
//         method :"POST",
//         body: formData
//     })

//     let data = await response.json();
//     let progressbar_hero = document.querySelector('div[role="progressbar_hero"]');
//     let progressbar_monster = document.querySelector('div[role="progressbar_monster"]');
//     progressbar_hero.innerHTML = data.hero.health_points;
//     progressbar_monster.innerHTML = data.monster.health_points;

//     progressbar_monster.setAttribute('aria-valuenow', data.monster.health_points)
//     progressbar_monster.style.width = data.monster.health_points + "%"

//     progressbar_hero.setAttribute('aria-valuenow', data.hero.health_points)
//     progressbar_hero.style.width = data.hero.health_points + "%"

//     // Arreter le combat lorque l'un des perso est dead
//     if (data.hero.health_points <= 0 || data.monster.health_points <= 0){
//         console.log("Le combat est terminé !");
//         clearInterval(timerInterval); 
//     }
    
// }
// let timerInterval = setInterval(timer, 1000);
// })

document.addEventListener('DOMContentLoaded', function() {
    let hero_id = document.querySelector('input[name="hero_id"]').value;
    let monster_id = document.querySelector('input[name="monster_id"]').value;
    let isHeroTurn = true;

    async function timer() {
        let formData = new FormData();
        formData.append('hero_id', hero_id);
        formData.append('monster_id', monster_id);

        let response = await fetch('./process/process_fight.php', {
            method: "POST",
            body: formData
        });

        let data = await response.json();
        let progressbar_hero = document.querySelector('div[role="progressbar_hero"]');
        let progressbar_monster = document.querySelector('div[role="progressbar_monster"]');
        let div_score_hero = document.querySelector('div[class="card-body"]');
        let div_score_monster = document.querySelector('div[class="card_monster"]'); 
        if (isHeroTurn) {
            // Logique spécifique pour le tour du héros
            console.log("C'est le tour du héros !");
            // Mettre à jour la barre de progression du héros
            div_score_hero.innerHTML = data.hero.health_points;
            // progressbar_hero.setAttribute('aria-valuenow', data.hero.health_points);
            progressbar_hero.style.width = data.hero.health_points + "%";
        } else {
            console.log("C'est le tour du monstre !");
            // Mettre à jour la barre de progression du monstre
            div_score_monster.innerHTML = data.monster.health_points; 
            // progressbar_monster.setAttribute('aria-valuenow', data.monster.health_points);
            progressbar_monster.style.width = data.monster.health_points + "%";
        }

        // Arrêter le combat lorsque l'un des personnages est mort
        if (data.hero.health_points <= 0 || data.monster.health_points <= 0) {
            console.log("Le combat est terminé !");
            clearInterval(timerInterval);
        }

        isHeroTurn = !isHeroTurn;  // Inverser le tour entre le héros et le monstre
    }

    // Déclenche la fonction timer toutes les secondes avec setInterval
    let timerInterval = setInterval(timer, 1000);
});
