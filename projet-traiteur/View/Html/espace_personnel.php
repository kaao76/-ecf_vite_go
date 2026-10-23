<?php

require_once __DIR__ . '/../../Controller/EspacePersonnelController.php';

require_once __DIR__ . '/includes/header.php';

?>


<div class="espace-client">

    <!-- MENU LATÉRAL -->
<aside class="espace-sidebar">

    <!-- IDENTITÉ DU CLIENT -->
    <div class="espace-utilisateur">
        <span class="espace-avatar" aria-hidden="true">●</span>

        <div class="espace-identite">
            <p class="espace-nom">
    <?= htmlspecialchars($_SESSION['prenom'] ?? '', ENT_QUOTES, 'UTF-8') ?>
</p>
            <p class="espace-role">Client(e)</p>
        </div>
    </div>

    <!-- NAVIGATION -->
    <nav class="espace-navigation" aria-label="Navigation de l'espace client">

        <button type="button" class="espace-lien actif">
            <span class="espace-icone" aria-hidden="true">⌂</span>
            Tableau de bord
        </button>

        <button type="button" class="espace-lien">
            <span class="espace-icone" aria-hidden="true">▣</span>
            Mes commandes
        </button>

        <button type="button" class="espace-lien">
            <span class="espace-icone" aria-hidden="true">♙</span>
            Mes informations
        </button>

        <button type="button" class="espace-lien">
            <span class="espace-icone" aria-hidden="true">☆</span>
            Mes avis
        </button>

    </nav>

    <!-- SÉPARATION -->
    <div class="espace-separateur"></div>

    <!-- DÉCONNEXION -->
    <button type="button" class="espace-lien espace-deconnexion">
        <span class="espace-icone" aria-hidden="true">⇥</span>
        Se déconnecter
    </button>

</aside>

    <!-- CONTENU PRINCIPAL DE L'ESPACE CLIENT -->
    <div class="espace-contenu">

        <section class="espace-bienvenue">
            <h1>Mon espace personnel</h1>
            <p>Bienvenue <?= htmlspecialchars($_SESSION['prenom'] ?? '', ENT_QUOTES, 'UTF-8') ?>, sur votre espace client Vite & Gourmand.</p>
        </section>

        <section class="espace-tableau-bord">
            <h2>Tableau de bord</h2>
            <p>
                Retrouvez ici vos commandes, vos informations
                personnelles et vos avis.
            </p>
        </section>

    </div>

</div>




<?php require_once 'includes/footer.php'; ?>