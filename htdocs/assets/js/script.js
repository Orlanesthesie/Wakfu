

document.addEventListener('DOMContentLoaded', async function(){

    let hero_id = document.querySelector('input[name="hero_id"]').value
    let monster_id = document.querySelector('input[name="monster_id"]').value

// setinterval toutes les secondes 

    console.log(hero_id, monster_id);

    let formData = new FormData();

    formData.append('hero_id', hero_id)
    formData.append('monster_id', monster_id)


    let response = await fetch('./process/process_fight.php', {
        method :"POST",
        body: formData
    })

    let data = await response.json();

    document.getElementById('hero_health_value').innerHTML = data.hero.health_points;
    document.getElementById('monster_health_value').innerHTML = data.monster.health_points;

  
})



