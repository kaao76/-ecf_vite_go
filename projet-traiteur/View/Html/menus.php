<?php

require_once 'includes/header.php';

?>


<main class="page-menus">

    <section class="menus-intro">

        <p class="menus-decoration">✦</p>

        <h1>Tous nos menus</h1>

        <p class="menus-intro-text">
            Des menus variés pour toutes vos envies et tous vos événements.
        </p>
    </section>


    <!-- filtres -->

    <section class="menus-filtres">

        <form class="filtres-form">


            <!-- Fourchette de prix -->
            <div class="filtre-groupe">

                <label for="prix-min">Prix minimum :</label>
                <input type="number" id="prix-min" name="prix-min" placeholder="€">
            </div>

            <div class="filtre-groupe">
                <label for="prix-fourchette-max">Prix maximum :</label>
                <input type="number" id="prix-fourchette-max" name="prix-fourchette-max" placeholder="€">
            </div>

            <div class="filtre-groupe">

                <label for="theme">Thème :</label>

                <select id="theme" name="theme">
                    <option value="">Tous les thèmes</option>
                    <option value="classique">Classique</option>
                    <option value="evenement">Événement</option>
                    <option value="noel">Noël</option>
                    <option value="paques">Pâques</option>

                </select>
            </div>

            <div class="filtre-groupe">


                <label for="regime">Régime :</label>
                <select id="regime" name="regime">
                    <option value="">Tous les régimes</option>
                    <option value="classique">Classique</option>
                    <option value="vegetarien">Végétarien</option>
                    <option value="vegan">Vegan</option>
                </select>
            </div>

            <div class="filtre-groupe">

                <label for="personnes">Nombre minimum de personnes :</label>
                <input type="number" id="personnes" name="personnes">
            </div>


            <button type="submit" class="bouton-filtrer">Filtrer</button>

        </form>

    </section>

    <!-- Les menus-->

    <section class="menus-liste">

        <div class="menus-titre">

            <div class="menus-ligne"></div>

            <div class="menus-titre-contenu">

                <h2>Nos menus</h2>

                <p>
                    Découvrez nos formules gourmandes
                    pensées pour vos événements.
                </p>

            </div>

            <div class="menus-ligne"></div>

        </div>


        <div class="menus-grille">

            <!-----MENU CLASSIQUE ----->

            <article
                class="menu-carte"
                data-prix="32"
                data-personnes="4"
                data-theme="classique"
                data-regime="classique">

                <div class="menu-image">
                    <img src="../../images/menu_classique.jpg" alt="Menu Classique">
                    <span class="menu-badge">
                        Classique
                    </span>

                </div>

                <div class="menu-contenu">

                    <h3>Menu Classique</h3>

                    <p class="menu-description">
                        Des saveurs fines et équilibrées pour un moment raffiné.
                    </p>

                    <div class="menu-informations">

                        <span class="menu-personnes">
                            ♙ 4 pers. min.
                        </span>

                        <span class="menu-prix">
                            32 € / personne
                        </span>
                    </div>


                    <a href="menu-details.php?id_menu=1" class="menu-bouton"> Voir détails →</a>
                </div>
            </article>


            <!----- MENU GOURMAND ----->


            <article
                class="menu-carte"
                data-prix="38"
                data-personnes="6"
                data-theme="evenement"
                data-regime="classique">

                <div class="menu-image">
                    <img src="../../images/menu_gourmand.jpg" alt="Menu Gourmand">
                    <span class="menu-badge">
                        Gourmand
                    </span>
                </div>

                <div class="menu-contenu">

                    <h3>Menu Gourmand</h3>

                    <p class="menu-description">
                        Le plaisir des bons produits sélectionnés avec soin.
                    </p>

                    <div class="menu-informations">

                        <span class="menu-personnes">
                            ♙ 6 pers. min.
                        </span>


                        <span class="menu-prix">
                            38 € / pers.
                        </span>

                    </div>

                    <a href="menu-details.php?id_menu=2" class="menu-bouton"> Voir détails →</a>
                </div>
            </article>

            <!---- MENU PRESTIGE --->


            <article
                class="menu-carte"
                data-prix="45"
                data-personnes="8"
                data-theme="evenement"
                data-regime="classique">

                <div class="menu-image">
                    <img src="../../images/menu_prestige.jpg" alt="Menu Prestige">
                    <span class="menu-badge">
                        Prestige
                    </span>
                </div>

                <div class="menu-contenu">


                    <h3>Menu Prestige</h3>

                    <p class="menu-description">
                        Une expérience culinaire unique pour un moment inoubliable.
                    </p>

                    <div class="menu-informations">

                        <span class="menu-personnes">
                            ♙ 8 pers. min.
                        </span>

                        <span class="menu-prix">
                            45 € / pers.
                        </span>

                    </div>

                    <a href="menu-details.php?id_menu=3" class="menu-bouton"> Voir détails →</a>
                </div>
            </article>
        </div>

</main>




<!-- Pourquoi choisir Vite & Gourmand -->



<section class="pourquoi">

    <div class="pourquoi-titre">

        <div class="icone-chef">
            ♨
        </div>

        <div>
            <p>POURQUOI CHOISIR VITE & GOURMAND ?</p>

            <h2>
                Une cuisine de qualité,<br>
                un service de confiance
            </h2>
        </div>

    </div>


    <div class="pourquoi-avantages">

        <div class="avantage">
            <span>✧</span>
            <p>Produits frais et de saison</p>
        </div>

        <div class="avantage">
            <span>♙</span>
            <p>Équipe passionnée et expérimentée</p>
        </div>

        <div class="avantage">
            <span>♡</span>
            <p>Menus personnalisables</p>
        </div>

        <div class="avantage">
            <span>♢</span>
            <p>Respect des normes d'hygiène et de sécurité</p>
        </div>

    </div>

</section>

<script src="../Js/menus.js"></script>

<?php

require_once 'includes/footer.php';

?>