<?php
require_once 'includes/header.php';

$id_menu = $_GET['id_menu'];

require_once '../../config/database.php';
require_once '../../entity/Menu.php';

$requete = $pdo->prepare("
    SELECT *
    FROM Menu
    WHERE id_menu = :id_menu
");

$requete->execute([
    'id_menu' => $id_menu
]);

$donnees = $requete->fetch();


$menu = new Menu(
    $donnees['id_menu'],
    $donnees['titre'],
    $donnees['description'],
    $donnees['nombre_personnes_min'],
    $donnees['prix_par_personne'],
    $donnees['conditions'],
    $donnees['stock_disponible'],
    $donnees['id_regime'],
    $donnees['id_theme']
);



?>

<main class="page-menu-details">

    <!-- Fil d'Ariane -->
    <div class="fil-ariane">
        <span>⌂</span>
        <span>Menus</span>
        <span>›</span>
        <span>Menu Classique</span>
    </div>


    <!-- Présentation principale -->
    <section class="menu-details-principal">

        <!-- GAUCHE : GALERIE -->
        <div class="menu-details-galerie">

            <div class="menu-image-principale">
                <!-- Image principale à ajouter plus tard -->
            </div>

            <div class="menu-galerie-vignettes">

                <div class="menu-vignette">
                    <!-- Image -->
                </div>

                <div class="menu-vignette">
                    <!-- Image -->
                </div>

                <div class="menu-vignette">
                    <!-- Image -->
                </div>

                <div class="menu-galerie-lien">
                    <span>▧</span>
                    <span>Voir toute la galerie</span>
                    <strong>→</strong>
                </div>

            </div>

        </div>


        <!-- DROITE : INFORMATIONS -->
        <div class="menu-details-contenu">

            <p class="menu-details-label">MENU</p>

            <h1>Menu Classique</h1>

            <p class="menu-details-slogan">
                Des saveurs fines et équilibrées pour un moment raffiné.
            </p>

            <p class="menu-details-description">
                Des saveurs fines et équilibrées pour un moment raffiné.
                Découvrez une sélection de produits soigneusement choisis
                pour un moment gourmand et élégant.
            </p>


            <!-- Informations -->
            <div class="menu-details-informations">

                <div class="menu-info-item">
                    <span class="menu-info-icone">♨</span>

                    <div>
                        <span>Thème</span>
                        <strong>Classique</strong>
                    </div>
                </div>


                <div class="menu-info-item">
                    <span class="menu-info-icone">♧</span>

                    <div>
                        <span>Régime</span>
                        <strong>Classique</strong>
                    </div>
                </div>


                <div class="menu-info-item">
                    <span class="menu-info-icone">♧</span>

                    <div>
                        <span>Min. personnes</span>
                        <strong>4</strong>
                    </div>
                </div>


                <div class="menu-info-item">
                    <span class="menu-info-icone">€</span>

                    <div>
                        <span>Prix (par personne)</span>
                        <strong>32 € / pers.</strong>
                    </div>
                </div>


                <div class="menu-info-item">
                    <span class="menu-info-icone">□</span>

                    <div>
                        <span>Stock</span>
                        <strong>20 disponibles</strong>
                    </div>
                </div>

            </div>


            <!-- Bouton -->
            <div class="menu-details-action">

                <a href="#" class="bouton">
                    🛒 Commander ce menu
                    <span>→</span>
                </a>

            </div>

        </div>

    </section>


    <!-- COMPOSITION -->
    <section class="menu-composition">

        <div class="menu-section-titre">

            <span></span>

            <h2>Composition du menu</h2>

            <span></span>

        </div>


        <div class="menu-plats">

            <!-- Entrée -->
            <article class="menu-plat">

                <div class="menu-plat-icone">
                    ♨
                </div>

                <h3>Entrée</h3>

                <h4>
                    Salade de chèvre chaud, noix et miel
                </h4>

                <p>
                    Salade de chèvre chaud accompagnée de noix
                    et de miel.
                </p>

            </article>


            <!-- Plat -->
            <article class="menu-plat">

                <div class="menu-plat-icone">
                    ◉
                </div>

                <h3>Plat</h3>

                <h4>
                    Suprême de poulet rôti,
                    sauce aux champignons
                </h4>

                <p>
                    Suprême de poulet rôti accompagné
                    d'une sauce aux champignons.
                </p>

            </article>


            <!-- Dessert -->
            <article class="menu-plat">

                <div class="menu-plat-icone">
                    ♨
                </div>

                <h3>Dessert</h3>

                <h4>
                    Tarte fine aux pommes,
                    caramel beurre salé
                </h4>

                <p>
                    Tarte fine aux pommes accompagnée
                    de caramel au beurre salé.
                </p>

            </article>

        </div>

    </section>


    <!-- ALLERGÈNES + CONDITIONS -->
    <section class="menu-details-bas">

        <!-- Allergènes -->
        <div class="menu-allergenes">

            <div class="menu-bas-icone">
                !
            </div>

            <div>

                <h3>Allergènes</h3>

                <p>
                    Lait, fruits à coque, gluten.
                </p>

            </div>

        </div>


        <!-- Conditions -->
        <div class="menu-conditions">

            <div class="menu-bas-icone">
                ▤
            </div>

            <div>

                <h3>Conditions du menu</h3>

                <ul>
                    <li>Minimum 4 personnes</li>
                    <li>Commande au moins 48 h à l'avance</li>
                    <li>Sous réserve de disponibilité des produits</li>
                </ul>

            </div>

        </div>

    </section>

</main>

<?php require_once 'includes/footer.php'; ?>