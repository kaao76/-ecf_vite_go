document.addEventListener("DOMContentLoaded", function () {

    // Conteneur des panneaux
    const conteneur = document.querySelector(
        ".authentification-conteneur"
    );

    

    // Bouton Sign In
    const boutonConnexion = document.getElementById(
        "auth-bouton-connexion"
    );

    // Bouton Sign Up
    const boutonInscription = document.getElementById(
        "auth-bouton-inscription"
    );

    // Sign In : déplacer la photo à gauche
    boutonConnexion.addEventListener("click", function () {
        conteneur.classList.add("mode-connexion");
    });

    // Sign Up : ramener la photo à droite
    boutonInscription.addEventListener("click", function () {
        conteneur.classList.remove("mode-connexion");
    });

});