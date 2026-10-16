<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vite & Gourmand</title>
    <link rel="stylesheet" href="../Css/style.css">
    <script src="../JS/header.js" defer></script>
</head>

<body>

    <!-- =========================
         EN-TÊTE
    ========================== -->

    <header class="header">
        <div class="logo">
            <h1>Vite & Gourmand</h1>

            <p>Traiteur depuis 25 ans</p>
        </div>
        <!-- Bouton du menu mobile -->
        <button
            type="button"
            class="menu-hamburger"
            aria-label="Ouvrir le menu de navigation"
            aria-expanded="false"
            aria-controls="navigation-principale">
            ☰
        </button>


        <nav class="navbar" id="navigation-principale">
            <a href="../Html/index.php">Accueil</a>
            <a href="../Html/menus.php">Nos menus</a>
            <a href="../Html/contact.php">Contact</a>
            <a href="../Html/connexion.php">Connexion</a>
            <a href="../Html/inscription.php" class="btn-inscription">Inscription</a>
        </nav>

    </header>
    <main>