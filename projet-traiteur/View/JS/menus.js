/* récupérer le formulaire et les menus */
const formulaire = document.querySelector('form');

const menus = document.querySelectorAll('.menu');

const prixMin = document.querySelector('#prix-min');

const prixFourchetteMax = document.querySelector('#prix-fourchette-max');

const theme = document.querySelector('#theme');

const regime = document.querySelector('#regime');

const personnes = document.querySelector('#personnes');


/* fonction qui applique tous les filtres */

function appliquerFiltres() {

    const prixMinimum = Number(prixMin.value);
    const prixMaximumFourchette = Number(prixFourchetteMax.value);

    const themeChoisi = theme.value;
    const regimeChoisi = regime.value;

    const personnesMinimum = Number(personnes.value);


    /* parcourir tous les menus */

    menus.forEach(function (menu) {

        /* récupérer les informations du menu */

        const prixMenu = Number(menu.dataset.prix);

        const themeMenu = menu.dataset.theme;

        const regimeMenu = menu.dataset.regime;

        const personnesMenu = Number(menu.dataset.personnes);


        /* vérifier le thème */

        const themeOk =
            themeChoisi === "" || themeChoisi === themeMenu;


        /* vérifier le régime */

        const regimeOk =
            regimeChoisi === "" || regimeChoisi === regimeMenu;


        /* vérifier le nombre de personnes */

        const personnesOk =
            personnes.value === "" || personnesMenu >= personnesMinimum;


        /* vérifier le prix */

        let prixOk;

        if (prixFourchetteMax.value === "") {

            if (prixMin.value === "") {
                prixOk = true;

            } else if (prixMenu >= prixMinimum) {
                prixOk = true;

            } else {
                prixOk = false;
            }

        } else if (prixMin.value === "") {

            if (prixMenu <= prixMaximumFourchette) {
                prixOk = true;
            } else {
                prixOk = false;
            }

        } else {

            if (
                prixMenu >= prixMinimum &&
                prixMenu <= prixMaximumFourchette
            ) {
                prixOk = true;
            } else {
                prixOk = false;
            }
        }


        /* afficher le menu seulement si TOUS les filtres sont OK */

        if (
            themeOk &&
            regimeOk &&
            personnesOk &&
            prixOk
        ) {
            menu.style.display = '';
        } else {
            menu.style.display = 'none';
        }

    });
}


/* empêcher le formulaire de recharger la page */

formulaire.addEventListener('submit', function (event) {

    event.preventDefault();

    appliquerFiltres();

});


/* appliquer automatiquement les filtres quand l'utilisateur change un select */

theme.addEventListener('change', appliquerFiltres);

regime.addEventListener('change', appliquerFiltres);


/* appliquer automatiquement les filtres quand l'utilisateur écrit dans les champs */

prixMin.addEventListener('input', appliquerFiltres);

prixFourchetteMax.addEventListener('input', appliquerFiltres);

personnes.addEventListener('input', appliquerFiltres);