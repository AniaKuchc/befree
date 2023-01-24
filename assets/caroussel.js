// Carrousssel Dashboard Activite
let cardWrapperActivite = document.querySelectorAll(".inactiveActivite");
let btnPreviousActivite = document.querySelector(".btnPreviousActivite");
let btnNextActivite = document.querySelector(".btnNextActivite");

function sliderActivite() {
  let count = 0;

  for (let i = count; i < 3; i++) {
    let active = cardWrapperActivite[i];
    if (active) {
      active.classList.remove("inactiveActivite");
    }
    count = i;
  }

  btnNextActivite.addEventListener("click", nextSlides);

  function nextSlides() {
    let active = cardWrapperActivite[count + 1];
    let inactive = cardWrapperActivite[count - 2];
    active.classList.remove("inactiveActivite");
    inactive.classList.add("inactiveActivite");
    count = count + 1;
  }

  btnPreviousActivite.addEventListener("click", previousSlides);

  function previousSlides() {
    let active = cardWrapperActivite[count - 3];
    let inactive = cardWrapperActivite[count];
    active.classList.remove("inactiveActivite");
    inactive.classList.add("inactiveActivite");
    count = count - 1;
  }
}

sliderActivite();

// Carrousssel Dashboard Inscription
let cardWrapperInscription = document.querySelectorAll(".inactiveInscription");
let btnPreviousInscription = document.querySelector(".btnPreviousInscription");
let btnNextInscription = document.querySelector(".btnNextInscription");

function sliderInscription() {
  let count = 0;

  for (let i = count; i < 3; i++) {
    let active = cardWrapperInscription[i];
    if (active) {
      active.classList.remove("inactiveInscription");
    }
    count = i;
  }

  btnNextInscription.addEventListener("click", nextSlides);

  function nextSlides() {
    let active = cardWrapperInscription[count + 1];
    let inactive = cardWrapperInscription[count - 2];
    active.classList.remove("inactiveInscription");
    inactive.classList.add("inactiveInscription");
    count = count + 1;
  }

  btnPreviousInscription.addEventListener("click", previousSlides);

  function previousSlides() {
    let active = cardWrapperInscription[count - 3];
    let inactive = cardWrapperInscription[count];
    active.classList.remove("inactiveInscription");
    inactive.classList.add("inactiveInscription");
    count = count - 1;
  }
}

sliderInscription();

// Carrousssel Dashboard Historique
let cardWrapperHistorique = document.querySelectorAll(".inactiveHistorique");
let btnPreviousHistorique = document.querySelector(".btnPreviousHistorique");
let btnNextHistorique = document.querySelector(".btnNextHistorique");

function sliderHistorique() {
  let count = 0;

  for (let i = count; i < 3; i++) {
    let active = cardWrapperHistorique[i];
    if (active) {
      active.classList.remove("inactiveHistorique");
    }
    count = i;
  }

  btnNextHistorique.addEventListener("click", nextSlides);

  function nextSlides() {
    let active = cardWrapperHistorique[count + 1];
    let inactive = cardWrapperHistorique[count - 2];
    active.classList.remove("inactiveHistorique");
    inactive.classList.add("inactiveHistorique");
    count = count + 1;
  }

  btnPreviousHistorique.addEventListener("click", previousSlides);

  function previousSlides() {
    let active = cardWrapperHistorique[count - 3];
    let inactive = cardWrapperHistorique[count];
    active.classList.remove("inactiveHistorique");
    inactive.classList.add("inactiveHistorique");
    count = count - 1;
  }
}

sliderHistorique();
