/* récupérer le formulaire et les menus. */
const formulaire = document.querySelector('form');

const menus = document.querySelectorAll('.menu');

const prixMax = document.querySelector('#prix-max');

const prixMin = document.querySelector('#prix-min');

const prixFourchetteMax = document.querySelector('#prix-fourchette-max');

const theme = document.querySelector('#theme');

const regime = document.querySelector('#regime');

const personnes = document.querySelector('#personnes');

/* empêcher le formulaire de recharger la page */

formulaire.addEventListener('submit', function(event) {

    event.preventDefault();


});