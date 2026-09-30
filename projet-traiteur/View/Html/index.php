<?php

require_once '../includes/header.php';

?>


<!-- =========================
         CONTENU PRINCIPAL
    ========================== -->

<!-- Présentation principale -->

<section class="hero">


    <h2><span class="doré">25 ans</span> de savoir-faire</h2>

    <h1><span class="doré">Vite & </span>Gourmand</h1>

    <p>
        La gastronomie au service de vos plus beaux moments.
    </p>

    <p>
        Depuis 25 ans, nous imaginons des menus gourmands
        et raffinés pour vos événements privés et professionnels.
    </p>

    <a href="menus.php" class="bouton">Découvrez nos menus</a>

    <a href="contact.php" class="bouton">Nous contacter</a>

</section>


<!-- Nos menus -->

<section class="menus">

    <h2>Nos menus</h2>

    <h3>Une cuisine pensée pour vos moments</h3>
    <div class="menus-cartes">

        <article class="menu">
            <img src="../../images/menu_classique.jpg" alt="Menu Classique">

            <h3>Menu Classique</h3>

            <p>
                Des recettes incontournables pour tous les goûts.
            </p>

            <p>
                32 € / personne
            </p>

            <a href="menus.php" class="bouton">Découvrir</a>

        </article>


        <article class="menu">
            <img src="../../images/menu_gourmand.jpg" alt="Menu Gourmand">

            <h3>Menu Gourmand</h3>


            <p>
                Le plaisir des bons produits.
            </p>

            <p>
                38 € / personne
            </p>

            <a href="menus.php" class="bouton">Découvrir</a>

        </article>


        <article class="menu">
            <img src="../../images/menu_prestige.jpg" alt="Menu Prestige">

            <h3>Menu Prestige</h3>


            <p>
                Une expérience culinaire unique.
            </p>

            <p>
                45 € / personne
            </p>

            <a href="menus.php" class="bouton">Découvrir</a>

        </article>


        <article class="menu">
            <img src="../../images/menu_sur_mesure.jpg" alt="Menu Sur-Mesure">

            <h3>Menu Sur-Mesure</h3>

            <p>
                Un menu adapté à vos envies.
            </p>

            <a href="contact.php" class="bouton">Nous contacter</a>

        </article>
    </div>

</section>


<!-- Histoire et savoir-faire -->

<section class="histoire">
    <!-- photo du chef -->
    <div class="histoire-image">
        <img src="../../images/chef_cooking2.png" alt="Chef Vite & Gourmand">
    </div>


    <div class="histoire-contenu">
        <h2>25 ans de passion et de savoir-faire</h2>

        <p>
            Depuis 25 ans, Vite & Gourmand accompagne
            les moments qui comptent : réceptions,
            événements professionnels et moments privés.
        </p>

        <p>
            Notre équipe met son expérience et son savoir-faire
            au service de chaque événement.
        </p>
    </div>
    <!-- Avantages à droite -->
    <div class="histoire-avantages">

        <div>
            <h3>Des produits frais</h3>
            <p>et de saison</p>
        </div>

        <div>
            <h3>Des recettes créatives</h3>
            <p>et authentiques</p>
        </div>

        <div>
            <h3>Une équipe passionnée</h3>
            <p>et expérimentée</p>
        </div>

    </div>


</section>


<!-- Les événements -->

<section class="evenements">

    <h4>VOS ÉVÉNEMENTS </h4>

    <h3>Notre expertise pour tous vos moments</h3>
    <div class="evenements-liste">


        <article class="evenement">
            <img src="../../images/event_mariage.jpg" alt="Événement Mariage">

            <h3>Mariage</h3>

        </article>


        <article class="evenement">
            <img src="../../images/event_corporate.jpg" alt="Événement Entreprise">

            <h3>Entreprise</h3>

        </article>


        <article class="evenement">
            <img src="../../images/event_birthday.jpg" alt="Événement Anniversaire">

            <h3>Anniversaire</h3>

        </article>


        <article class="evenement">
            <img src="../../images/event_family.jpg" alt="Événement Fête de famille">

            <h3>Fête de famille</h3>

        </article>
    </div>

</section>


<!-- Avis clients -->

<section class="avis">

    <h2>Ce que nos clients disent</h2>

    <h3>Leur confiance, notre plus belle récompense</h3>


    <article>


        <!-- Les avis seront affichés ici plus tard. Seuls les avis validés par un employé seront récupérés depuis la BDD -->



    </article>

</section>



<section class="contact">

    <h2>Un événement à préparer ?</h2>

    <p>
        Parlons ensemble de votre projet.
    </p>

    <a href="contact.php" class="bouton">Nous contacter</a>

</section>


<?php

require_once '../includes/footer.php';

?>