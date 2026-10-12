<?php

require_once __DIR__ . '/../../controller/MenuController.php';
require_once 'includes/header.php';

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

            <h1><?= $menu->getTitre(); ?></h1>



            <p class="menu-details-description">
                <?= $menu->getDescription()
                ?>
            </p>


            <!-- Informations -->
            <div class="menu-details-informations">

                <div class="menu-info-item">
                    <span class="menu-info-icone">♨</span>

                    <div>
                        <span>Thème</span>
                        <strong><?= $donnees['theme']; ?></strong>
                    </div>
                </div>


                <div class="menu-info-item">
                    <span class="menu-info-icone">♧</span>

                    <div>
                        <span>Régime</span>
                        <strong><?= $donnees['regime']; ?></strong>
                    </div>
                </div>


                <div class="menu-info-item">
                    <span class="menu-info-icone">♧</span>

                    <div>
                        <span>Min. personnes</span>
                        <strong><?= $menu->getNombrePersonnesMin(); ?></strong>
                    </div>
                </div>


                <div class="menu-info-item">
                    <span class="menu-info-icone">€</span>

                    <div>
                        <span>Prix (par personne)</span>
                        <strong><?= $menu->getPrixParPersonne(); ?> € / pers.</strong>
                    </div>
                </div>


                <div class="menu-info-item">
                    <span class="menu-info-icone">□</span>

                    <div>
                        <span>Stock</span>
                        <strong><?= $menu->getStockDisponible(); ?> disponibles</strong>
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

            <?php foreach ($plats as $plat) : ?>

                <article class="menu-plat">

                    <div class="menu-plat-icone">
                        ♨
                    </div>

                    <h3><?= htmlspecialchars($plat['type_plat']); ?></h3>

                    <h4>
                        <?= htmlspecialchars($plat['titre']); ?>
                    </h4>

                    <p>
                        <?= htmlspecialchars($plat['description']); ?>
                    </p>

                </article>

            <?php endforeach; ?>

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
                    <?php foreach ($allergenes as $index => $allergene) : ?>
                        <?= htmlspecialchars($allergene['libelle']); ?><?= $index < count($allergenes) - 1 ? ', ' : ''; ?>
                    <?php endforeach; ?>
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

                <p><?= $menu->getConditions(); ?></p>

            </div>

        </div>

    </section>

</main>

<?php require_once 'includes/footer.php'; ?>