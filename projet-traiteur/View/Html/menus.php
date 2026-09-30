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

        <label for="prix-max">Prix maximum :</label>
        <input type="number" id="prix-max" name="prix-max">


        <label for="prix-min">Prix minimum :</label>
        <input type="number" id="prix-min" name="prix-min">


        <label for="theme">Thème :</label>
        <select id="theme" name="theme">
        </select>


        <label for="regime">Régime :</label>
        <select id="regime" name="regime">
        </select>


        <label for="personnes">Nombre minimum de personnes :</label>
        <input type="number" id="personnes" name="personnes">


        <button type="submit">Filtrer</button>

    </form>

    <!-- Les menus-->


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


    <h2>Menu Gourmand</h2>

    <p>
        Le plaisir des bons produits sélectionnés avec soin.
    </p>
    <p>6 pers. min.</p>

    <p>
        38 € / personne
    </p>
    <a href="#"> Voir détails</a>


    <h2>Menu Prestige</h2>

    <p>
        Une expérience culinaire unique pour un moment inoubliable.
    </p>

    <p>8 pers. min.</p>

    <p>
        45 € / personne
    </p>
    <a href="#"> Voir détails</a>

</main>

<?php

require_once 'includes/footer.php';

?>