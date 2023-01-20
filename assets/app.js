/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.scss";
import "bootstrap";
import bsCustomFileInput from "bs-custom-file-input";

// start the Stimulus application
import "./bootstrap";
bsCustomFileInput.init();

// Carrousssel Dashboard Activite
let cardWrapperActivite = document.querySelectorAll(".inactiveActivite");
let btnPreviousActivite = document.querySelector(".btnPreviousActivite");
let btnNextActivite = document.querySelector(".btnNextActivite");
let ContainerActivite = document.querySelector(".ContainerActivite");
let arrowPreviousActivite = document.querySelector(".arrowPreviousActivite");
let arrowNextActivite = document.querySelector(".arrowNextActivite");

function sliderActivite() {
  let count = 0;

  btnPreviousActivite.classList.add("arrowActiviteInactive");
  btnNextActivite.classList.add("arrowActiviteInactive");
  arrowPreviousActivite.classList.add("arrowActiviteInactive");
  arrowNextActivite.classList.add("arrowActiviteInactive");
  ContainerActivite.classList.remove("justify-content-around");
  ContainerActivite.classList.remove("justify-content-around");

  for (let i = count; i < 3; i++) {
    let active = cardWrapperActivite[i];
    active.classList.remove("inactiveActivite");
    count = i;
  }

  if (cardWrapperActivite.length > 3) {
    btnPreviousActivite.classList.remove("arrowActiviteInactive");
    btnNextActivite.classList.remove("arrowActiviteInactive");
    arrowPreviousActivite.classList.remove("arrowActiviteInactive");
    arrowNextActivite.classList.remove("arrowActiviteInactive");
    ContainerActivite.classList.add("justify-content-around");
    ContainerActivite.classList.add("justify-content-around");
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
let ContainerInscription = document.querySelector(".ContainerInscription");
let arrowPreviousInscription = document.querySelector(
  ".arrowPreviousInscription"
);
let arrowNextInscription = document.querySelector(".arrowNextInscription");

function sliderInscription() {
  let count = 0;

  btnPreviousInscription.classList.add("arrowInscriptionInactive");
  btnNextInscription.classList.add("arrowInscriptionInactive");
  arrowPreviousInscription.classList.add("arrowInscriptionInactive");
  arrowNextInscription.classList.add("arrowInscriptionInactive");
  ContainerInscription.classList.remove("justify-content-around");
  ContainerInscription.classList.remove("justify-content-around");

  for (let i = count; i < 3; i++) {
    let active = cardWrapperInscription[i];
    active.classList.remove("inactiveInscription");
    count = i;
  }

  if (cardWrapperInscription.length > 3) {
    btnPreviousInscription.classList.remove("arrowInscriptionInactive");
    btnNextInscription.classList.remove("arrowInscriptionInactive");
    arrowPreviousInscription.classList.remove("arrowInscriptionInactive");
    arrowNextInscription.classList.remove("arrowInscriptionInactive");
    ContainerInscription.classList.add("justify-content-around");
    ContainerInscription.classList.add("justify-content-around");
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
let ContainerHistorique = document.querySelector(".ContainerHistorique");
let arrowPreviousHistorique = document.querySelector(
  ".arrowPreviousHistorique"
);
let arrowNextHistorique = document.querySelector(".arrowNextHistorique");

function sliderHistorique() {
  let count = 0;

  btnPreviousHistorique.classList.add("arrowHistoriqueInactive");
  btnNextHistorique.classList.add("arrowHistoriqueInactive");
  arrowPreviousHistorique.classList.add("arrowHistoriqueInactive");
  arrowNextHistorique.classList.add("arrowHistoriqueInactive");
  ContainerHistorique.classList.remove("justify-content-around");
  ContainerHistorique.classList.remove("justify-content-around");

  for (let i = count; i < 3; i++) {
    let active = cardWrapperHistorique[i];
    active.classList.remove("inactiveHistorique");
    count = i;
  }

  if (cardWrapperHistorique.length > 3) {
    btnPreviousHistorique.classList.remove("arrowHistoriqueInactive");
    btnNextHistorique.classList.remove("arrowHistoriqueInactive");
    arrowPreviousHistorique.classList.remove("arrowHistoriqueInactive");
    arrowNextHistorique.classList.remove("arrowHistoriqueInactive");
    ContainerHistorique.classList.add("justify-content-around");
    ContainerHistorique.classList.add("justify-content-around");
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

//Leaflet
let map = L.map("map").setView([51.505, -0.09], 13);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);
