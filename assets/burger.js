//Burger menu

let burgerIcon = document.querySelector("#burger");
let burgerMenu = document.querySelector("#burger__menu");


burgerIcon.onclick = function () {
    console.log(`TOTO`);
    displayBurgerMenu();
}

function displayBurgerMenu() {

    if (burgerMenu.classList.contains("noDisplay")) {
        burgerMenu.classList.toggle("noDisplay");
        burgerMenu.style.display = "flex";
    } else {
        burgerMenu.classList.toggle("noDisplay");
        burgerMenu.style.display = "none";
    }
}






