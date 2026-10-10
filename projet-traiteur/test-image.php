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
