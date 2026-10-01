<?php

require_once 'includes/header.php';

?>
<main>

    <h1>Nos menus</h1>

    <p>
        Des menus variés pour toutes vos envies et tous vos événements.
    </p>


    <!-- filtres -->
    <form>

        <!-- Prix maximum -->
        <label for="prix-max">Prix maximum :</label>
        <input type="number" id="prix-max" name="prix-max">


        <!-- Fourchette de prix -->
        <label for="prix-min">Prix minimum :</label>
        <input type="number" id="prix-min" name="prix-min">

        <label for="prix-fourchette-max">Prix maximum :</label>
        <input type="number" id="prix-fourchette-max" name="prix-fourchette-max">


        <label for="theme">Thème :</label>

        <select id="theme" name="theme">
            <option value="">Tous les thèmes</option>
            <option value="classique">Classique</option>
            <option value="evenement">Événement</option>
            <option value="noel">Noël</option>
            <option value="paques">Pâques</option>

        </select>


        <label for="regime">Régime :</label>
        <select id="regime" name="regime">
            <option value="">Tous les régimes</option>
            <option value="classique">Classique</option>
            <option value="vegetarien">Végétarien</option>
            <option value="vegan">Vegan</option>
        </select>


        <label for="personnes">Nombre minimum de personnes :</label>
        <input type="number" id="personnes" name="personnes">


        <button type="submit">Filtrer</button>

    </form>

    <!-- Les menus-->
    <article
        class="menu"
        data-prix="32"
        data-personnes="4"
        data-theme="classique"
        data-regime="classique">


        <h2>Menu Classique</h2>

        <p>
            Des saveurs fines et équilibrées pour un moment raffiné.
        </p>

        <p>
            4 pers. min.
        </p>

        <p>
            32 € / personne
        </p>

        <a href="#"> Voir détails</a>
    </article>

    <article
        class="menu"
        data-prix="38"
        data-personnes="6"
        data-theme="evenement"
        data-regime="classique">


        <h2>Menu Gourmand</h2>

        <p>
            Le plaisir des bons produits sélectionnés avec soin.
        </p>
        <p>6 pers. min.</p>

        <p>
            38 € / personne
        </p>
        <a href="#"> Voir détails</a>
    </article>

    <article
        class="menu"
        data-prix="45"
        data-personnes="8"
        data-theme="evenement"
        data-regime="classique">

        <h2>Menu Prestige</h2>

        <p>
            Une expérience culinaire unique pour un moment inoubliable.
        </p>

        <p>8 pers. min.</p>

        <p>
            45 € / personne
        </p>
        <a href="#"> Voir détails</a>
    </article>



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