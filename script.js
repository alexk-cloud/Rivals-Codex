const searchBar = document.getElementById("text-search");
const heroes = document.querySelectorAll(".hero-card");
const filter = document.getElementById("filter");
const popUp = document.getElementById("popup");
const roleRadio = document.getElementsByClassName("role-radio");
const cancelBtn = document.getElementById("cancelBtn");
const confirmBtn = document.getElementById("confirmBtn");

function textSearch() {
    let searchValue = searchBar.value.toLowerCase();

    for (let i = 0; i < heroes.length; i++) {
        let hero = heroes[i];
        let name = hero.getAttribute("data-name").toLowerCase();

        if (name.includes(searchValue)) {
            hero.style.display = "flex";
        }
        else hero.style.display = "none";
    }
}

function showMenu() {
    popUp.showModal();
}

function closeMenu() {
    popUp.close();
}

function filterByRole() {
    const selectedRole = document.querySelector('input[name="role"]:checked');

    if (!selectedRole) return;
    console.log(selectedRole);

    for (let i = 0; i < heroes.length; i++) {
        let hero = heroes[i];
        let role = hero.getAttribute("data-role");

        if (selectedRole.value === "" || role === selectedRole.value) {
            hero.style.display = "flex";
        }
        else hero.style.display = "none";
    }
}

searchBar.addEventListener("input", textSearch);
filter.addEventListener("click", showMenu);
cancelBtn.addEventListener("click", closeMenu)
popUp.addEventListener("close", filterByRole);