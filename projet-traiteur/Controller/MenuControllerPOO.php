<?php
require_once __DIR__ . '/../entity/Menu.php';

class MenuControllerPOO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getMenuById(int $id_menu): ?array
{
    $requete = $this->pdo->prepare("
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

    return $donnees === false ? null : $donnees;
}

public function getPlatsByMenuId(int $id_menu): array
{
    $requetePlats = $this->pdo->prepare("
        SELECT Plat.*
        FROM MenuPlat
        INNER JOIN Plat ON MenuPlat.id_plat = Plat.id_plat
        WHERE MenuPlat.id_menu = :id_menu
        ORDER BY FIELD(Plat.type_plat, 'Entrée', 'Plat', 'Dessert')
    ");

    $requetePlats->execute([
        'id_menu' => $id_menu
    ]);

    $plats = $requetePlats->fetchAll(PDO::FETCH_ASSOC); /* « Je récupère toutes les lignes renvoyées par la requête, sous forme de tableaux associatifs,
     et je les stocke dans la variable $plats. » */

     /*FETCH_ASSOC	Constante demandant un tableau associatif */

    return $plats;
}

public function getAllergenesByMenuId(int $id_menu): array
{
    $requeteAllergenes = $this->pdo->prepare("
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

    return $allergenes;
}

public function getImagesByMenuId(int $id_menu): array
{
    $requeteImages = $this->pdo->prepare("
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

    return $images;
}

public function getDetailsMenu(int $id_menu): ?array
{
    $donnees = $this->getMenuById($id_menu);

    if ($donnees === null) {
        return null;
    }

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

    $plats = $this->getPlatsByMenuId($id_menu);

    $allergenes = $this->getAllergenesByMenuId($id_menu);

    $images = $this->getImagesByMenuId($id_menu);

    return [
        'menu' => $menu,
        'donnees' => $donnees,
        'plats' => $plats,
        'allergenes' => $allergenes,
        'images' => $images
    ];
}


}