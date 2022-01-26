
document.addEventListener("DOMContentLoaded", async () => {
    await load_data();
});


async function load_data() {
    const contentElement = document.getElementById("content");
    const editerElement = document.getElementById("editer_selecteur");
    const supprimerElement = document.getElementById("supprimer_selecteur");
    const request = await fetch("/list.php");
    const champions = await request.json();
    contentElement.innerHTML = "";
    editerElement.innerHTML = "";
    supprimerElement.innerHTML = "";
    for (const champion of champions) {
        contentElement.innerHTML += `<div class="card">
        <img src="${champion.imageSrc}">
        <p>Name: ${champion.name}, <br>Level: ${champion.level}, <br>Type of power: ${champion.power}</p>
        </div>`;


        editerElement.innerHTML += `
            <option value="${champion.name}">${champion.name}</option>
        `
        supprimerElement.innerHTML += `
        <option value="${champion.name}">${champion.name}</option>
        `
    }
}


async function send_pokemon() {
    // Création du champion
    const name = document.getElementById("name_input").value;
    const level = parseInt(document.getElementById("level_input").value);
    const power = document.getElementById("power_input").value;
    const url = document.getElementById("url_input").value;
    const champion = {
        "name": name, "level": level, "power": power,
        "imageSrc": `${url}`
    };
    // envoi du pokémon en POST
    await fetch("/add.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(champion)
    });
    
    await load_data();
    let msg = ("Your pokémon has been added")
    alert(msg)
}

async function supp() {
    const select = document.getElementById("supprimer_selecteur").value;
    await fetch("/delete.php", {
        method: "DELETE",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            "name": select
        })
    });
    let msg = ("Your pokémon has been deleted")
    alert(msg)
    await load_data();
}

async function editer() {
    const name = document.getElementById("name_edit").value;
    const level = parseInt(document.getElementById("level_edit").value);
    const power = document.getElementById("power_edit").value;
    const url = document.getElementById("url_edit").value;
    const edit = document.getElementById("editer_selecteur").value;

    const champions = {
        "name": name, "level": level, "power": power, "old_name" : edit,
        "imageSrc": `${url}`
    };
    await fetch("/edit.php", {
        method: "PUT",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(champions)
    });
    await load_data();
    let msg = ("Your pokémon has been edited")
    alert(msg)
}