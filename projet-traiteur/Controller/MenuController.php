```php
<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../entity/Menu.php';

// Récupérer et vérifier l'identifiant du menu
$id_menu = filter_input(INPUT_GET, 'id_menu', FILTER_VALIDATE_INT);

if (!$id_menu || $id_menu <= 0) {
    http_response_code(400);
    exit('Identifiant de menu invalide.');
}

// Récupérer le menu, son thème et son régime
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

$donnees = $requete->fetch(PDO::FETCH_ASSOC);

if (!$donnees) {
    http_response_code(404);
    exit('Menu introuvable.');
}

// Créer l'objet Menu
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

// Récupérer les plats du menu
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

$plats = $requetePlats->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les allergènes des plats du menu
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

$allergenes = $requeteAllergenes->fetchAll(PDO::FETCH_ASSOC);


 // Récupérer les images des plats du menu
$requeteImages = $pdo->prepare("
    SELECT
        Image.id_image,
        Image.titre,
        Image.url_image,
        Image.texte_alternatif,
        Plat.type_plat
    FROM MenuPlat
    INNER JOIN Plat
        ON MenuPlat.id_plat = Plat.id_plat
    INNER JOIN Image
        ON Plat.id_plat = Image.id_plat
    WHERE MenuPlat.id_menu = :id_menu
      AND Image.actif = 1
    ORDER BY FIELD(Plat.type_plat, 'Entrée', 'Plat', 'Dessert')
");

$requeteImages->execute([
    'id_menu' => $id_menu
]);

$images = $requeteImages->fetchAll(PDO::FETCH_ASSOC);
