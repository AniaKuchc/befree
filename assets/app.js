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

// Carrousssel Dashboard
let cardWrapper = document.querySelectorAll(".inactiveActivite");
let btnPrevious = document.querySelector(".btnPreviousActivite");
let btnNext = document.querySelector(".btnNextActivite");

let count = 0;

for (let i = count; i < 3; i++) {
  let active = cardWrapper[i];
  active.classList.remove("inactiveActivite");
  count = i;
}

btnNext.addEventListener("click", nextSlides);

function nextSlides() {
  let active = cardWrapper[count + 1];
  let inactive = cardWrapper[count - 2];
  active.classList.remove("inactiveActivite");
  inactive.classList.add("inactiveActivite");
  count = count + 1;
}

btnPrevious.addEventListener("click", previousSlides);

function previousSlides() {
  let active = cardWrapper[count - 3];
  let inactive = cardWrapper[count];
  active.classList.remove("inactiveActivite");
  inactive.classList.add("inactiveActivite");
  count = count - 1;
}
