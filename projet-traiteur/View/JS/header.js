const boutonHamburger = document.querySelector(".menu-hamburger");
const navigation = document.querySelector(".navbar");



boutonHamburger.addEventListener("click", function () {
    navigation.classList.toggle("menu-ouvert");
    boutonHamburger.textContent = navigation.classList.contains("menu-ouvert") ? "✕" : "☰";
    const menuEstOuvert = navigation.classList.contains("menu-ouvert");

boutonHamburger.setAttribute("aria-expanded", String(menuEstOuvert));

boutonHamburger.setAttribute(
    "aria-label",
    menuEstOuvert ? "Fermer le menu de navigation" : "Ouvrir le menu de navigation"
);
});