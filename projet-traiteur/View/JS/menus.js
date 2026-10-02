/* récupérer le formulaire et les menus */
const formulaire = document.querySelector('form');

const menus = document.querySelectorAll('.menu');

const prixMin = document.querySelector('#prix-min');

const prixFourchetteMax = document.querySelector('#prix-fourchette-max');

const theme = document.querySelector('#theme');

const regime = document.querySelector('#regime');

const personnes = document.querySelector('#personnes');


/* empêcher le formulaire de recharger la page */

formulaire.addEventListener('submit', function (event) {

    event.preventDefault();

    const prixMinimum = Number(prixMin.value); /* récupérer la valeur du prix minimum à partir de l'input */
    const prixMaximumFourchette = Number(prixFourchetteMax.value); /* récupérer la valeur du prix maximum de la fourchette à partir de l'input */


    menus.forEach(function (menu) { /* parcourir tous les menus */
        /* récupérer le prix du menu à partir de l'attribut data-prix */
        const prixMenu = Number(menu.dataset.prix); 

        /* comparer le prix du menu avec le prix maximum */


        if (prixFourchetteMax.value === "") {

            if (prixMenu >= prixMinimum) {
                menu.style.display = '';
            } else {
                menu.style.display = 'none';
            }

        } else if (prixMin.value === "") {

            if (prixMenu <= prixMaximumFourchette) {
                menu.style.display = '';
            } else {
                menu.style.display = 'none';
            }

        } else {

            if (prixMenu >= prixMinimum && prixMenu <= prixMaximumFourchette) {
                menu.style.display = '';
            } else {
                menu.style.display = 'none';
            }
        }

    });

});