document.addEventListener("DOMContentLoaded", function () {

    const imagePrincipale = document.getElementById("image-principale");
    const vignettes = document.querySelectorAll(".menu-vignette");
    const indicateurs = document.querySelectorAll(".galerie-indicateur");
    const flechePrecedente = document.querySelector(".galerie-precedente");

    const flecheSuivante = document.querySelector(".galerie-suivante");
    console.log(flechePrecedente);
    console.log(flecheSuivante);
    console.log(indicateurs);
    let indexActuel = 0; /* index de l'image actuellement affichée */

    console.log(imagePrincipale);
    console.log(vignettes);

    vignettes.forEach(function (vignette, index) {

        vignette.addEventListener("click", function () {

            const petiteImage = vignette.querySelector("img");

            imagePrincipale.src = petiteImage.src;

            indexActuel = index;
            console.log("Index actuel :", indexActuel);
            indicateurs.forEach(function (indicateur) {
                indicateur.classList.remove("actif");
            });

            indicateurs[indexActuel].classList.add("actif");

        });

    });

    flecheSuivante.addEventListener("click", function () {

        console.log("Flèche droite cliquée !");
        indexActuel++;
        if (indexActuel >= vignettes.length) {
            indexActuel = 0;
        }
        console.log("Nouvel index :", indexActuel);
        const imageSuivante = vignettes[indexActuel].querySelector("img");

        imagePrincipale.src = imageSuivante.src;
        indicateurs.forEach(function (indicateur) {
            indicateur.classList.remove("actif");
        });

        indicateurs[indexActuel].classList.add("actif");

    });

    flechePrecedente.addEventListener("click", function () {

        console.log("Flèche gauche cliquée !");
        indexActuel--;
        if (indexActuel < 0) {
            indexActuel = vignettes.length - 1;
        }
        console.log("Nouvel index gauche :", indexActuel);
        const imagePrecedente = vignettes[indexActuel].querySelector("img");

        imagePrincipale.src = imagePrecedente.src;
        indicateurs.forEach(function (indicateur) {
    indicateur.classList.remove("actif");
});

indicateurs[indexActuel].classList.add("actif");


    });
    indicateurs.forEach(function (indicateur, index) {

        indicateur.addEventListener("click", function () {

            console.log("Indicateur cliqué :", index);
            indexActuel = index;

            const imageSelectionnee = vignettes[indexActuel].querySelector("img");

            imagePrincipale.src = imageSelectionnee.src;

            indicateurs.forEach(function (indicateur) {

                indicateur.classList.remove("actif");

            });
            indicateurs[indexActuel].classList.add("actif");

        });

    });

});