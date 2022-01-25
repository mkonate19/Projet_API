document.addEventListener("DOMContentLoaded", async () => {
    await load_data();
});


async function load_data() {
    const contentElement = document.getElementById("content");
    const request = await fetch("/list.php");
    const pokemons = await request.json();
    contentElement.innerHTML = "";
    for (const pokemon of pokemons) {
        contentElement.innerHTML += `<span>`;
        contentElement.innerHTML += `${pokemon.name} name, ${pokemon.level} level, ${pokemon.power} power`;
        contentElement.innerHTML += `<img src="${pokemon.imageSrc}">`;
        contentElement.innerHTML += `</span>`;
    }
}

async function send_pokemon() {
    // Création du champion
    const name = document.getElementById("name_input").value;
    const level = parseInt(document.getElementById("level_input").value);
    const power = document.getElementById("power_input").value;
    const pokemon = {
        "name": name, "level": level, "power" : power,
        "imageSrc": "https://tse3.mm.bing.net/th?id=OIP.GtxdeHzSLv5TXNHqX5vPwQHaHa&pid=Api&P=0&w=187&h=187"
    };
    // envoi du champion en POST
    await fetch("/add.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(pokemon)
    });
    await load_data();
}