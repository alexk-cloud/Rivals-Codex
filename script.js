const searchBar = document.getElementById("text-search");
const heroes = document.querySelectorAll(".hero-card");

function textSearch() {
    let filter = searchBar.value.toLowerCase();

    for (let i = 0; i < heroes.length; i++) {
        let hero = heroes[i];
        let name = hero.getAttribute("data-name").toLowerCase();

        if (name.includes(filter)) {
            hero.style.display = "flex";
        }
        else hero.style.display = "none";
    }
}

searchBar.addEventListener("input", textSearch);