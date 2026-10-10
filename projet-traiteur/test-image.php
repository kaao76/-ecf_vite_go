<?php

require_once 'entity/Image.php';
require_once 'config/database.php';


$id_image = 1;

$requete = $pdo->prepare("
    SELECT *
    FROM Image
    WHERE id_image = :id_image
");

$requete->execute([
    'id_image' => $id_image
]);

$donnees = $requete->fetch(); 


$image = new Image(
    $donnees['id_image'],
    $donnees['titre'],
    $donnees['url_image'],
    $donnees['type'],
    $donnees['texte_alternatif'],
    $donnees['actif'],
    $donnees['id_plat'],
    $donnees['id_menu']
);


echo $image->getTitre() . "<br>";
echo $image->getUrlImage() . "<br>";
echo $image->getType() . "<br>";
