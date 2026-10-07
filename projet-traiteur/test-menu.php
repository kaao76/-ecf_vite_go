<?php

require_once 'entity/Menu.php';
require_once 'config/database.php';

$id_menu = 1;

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

echo $menu->getTitre() . "<br>";
echo $menu->getNombrePersonnesMin() . " personnes minimum<br>";
echo $menu->getPrixParPersonne() . " € / personne<br>";
echo $menu->getStockDisponible() . " disponibles<br>";