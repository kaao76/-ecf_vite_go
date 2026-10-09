<?php
require_once 'includes/header.php';

$id_menu = $_GET['id_menu'];

require_once '../../config/database.php';
require_once '../../entity/Menu.php';

$requete = $pdo->prepare("
    SELECT 
        Menu.*,
        Theme.libelle AS theme,
        Regime.libelle AS regime
    FROM Menu
    INNER JOIN Theme ON Menu.id_theme = Theme.id_theme
    INNER JOIN Regime ON Menu.id_regime = Regime.id_regime
    WHERE Menu.id_menu = :id_menu
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

$requetePlats = $pdo->prepare("
    SELECT Plat.*
    FROM MenuPlat
    INNER JOIN Plat ON MenuPlat.id_plat = Plat.id_plat
    WHERE MenuPlat.id_menu = :id_menu
    ORDER BY FIELD(Plat.type_plat, 'Entrée', 'Plat', 'Dessert')
");

$requetePlats->execute([
    'id_menu' => $id_menu
]);

$plats = $requetePlats->fetchAll();

$requeteAllergenes = $pdo->prepare("
    SELECT DISTINCT Allergene.libelle
    FROM MenuPlat
    INNER JOIN Plat
        ON MenuPlat.id_plat = Plat.id_plat
    INNER JOIN PlatAllergene
        ON Plat.id_plat = PlatAllergene.id_plat
    INNER JOIN Allergene
        ON PlatAllergene.id_allergene = Allergene.id_allergene
    WHERE MenuPlat.id_menu = :id_menu
    ORDER BY Allergene.libelle
");

$requeteAllergenes->execute([
    'id_menu' => $id_menu
]);

$allergenes = $requeteAllergenes->fetchAll();

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