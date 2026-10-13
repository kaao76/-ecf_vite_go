<?php

require_once __DIR__ . '/../../controller/MenuController.php';
require_once 'includes/header.php';

?>

<main class="page-menu-details">

  <!-- Fil d'Ariane -->
<div class="fil-ariane">
    <a href="menus.php">Menus</a>
    <span>›</span>
    <span><?= htmlspecialchars($menu->getTitre()); ?></span>
</div>


    <!-- Présentation principale -->
    <section class="menu-details-principal">

       
<!-- GAUCHE : GALERIE -->
<div class="menu-details-galerie">

    <?php if (!empty($images)) : ?> 

        <!-- Grande image -->
        <div class="menu-image-principale">

            <img
                id="image-principale"
                src="../../<?= htmlspecialchars($images[0]['url_image']); ?>"
                alt="<?= htmlspecialchars($images[0]['texte_alternatif']); ?>"
            >

            <!-- Flèche précédente -->
            <button type="button"
                    class="galerie-fleche galerie-precedente"
                    aria-label="Image précédente">
                &#10094;
            </button>

            <!-- Flèche suivante -->
            <button type="button"
                    class="galerie-fleche galerie-suivante"
                    aria-label="Image suivante">
                &#10095;
            </button>

            <!-- Indicateurs -->
            <div class="galerie-indicateurs">
                <?php foreach ($images as $index => $image) : ?>
                    <button
                        type="button"
                        class="galerie-indicateur <?= $index === 0 ? 'actif' : ''; ?>"
                        data-index="<?= $index; ?>"
                        aria-label="Afficher l'image <?= $index + 1; ?>">
                    </button>
                <?php endforeach; ?>
            </div>

        </div>

        <!-- Miniatures -->
        <div class="menu-galerie-vignettes">

            <?php foreach ($images as $index => $image) : ?>
                <button
                    type="button"
                    class="menu-vignette <?= $index === 0 ? 'active' : ''; ?>"
                    data-index="<?= $index; ?>"
                    aria-label="Afficher <?= htmlspecialchars($image['titre']); ?>">

                    <img
                        src="../../<?= htmlspecialchars($image['url_image']); ?>"
                        alt="<?= htmlspecialchars($image['texte_alternatif']); ?>"
                    >
                </button>
            <?php endforeach; ?>

        </div>

    <?php else : ?>

        <p>Aucune image disponible pour ce menu.</p>

    <?php endif; ?>

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

                <a href="commande.php?id_menu=<?= (int) $menu->getIdMenu(); ?>" class="bouton">
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

<script src="../Js/menu-details.js" defer></script>
<?php require_once 'includes/footer.php'; ?>