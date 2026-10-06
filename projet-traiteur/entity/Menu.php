<?php

class Menu
{
    private $id_menu;
    private $titre;
    private $description;
    private $nombre_personnes_min;
    private $prix_par_personne;
    private $conditions;
    private $stock_disponible;
    private $id_regime;
    private $id_theme;

    public function __construct(
    $id_menu = null,
    $titre = null,
    $description = null,
    $nombre_personnes_min = null,
    $prix_par_personne = null,
    $conditions = null,
    $stock_disponible = null,
    $id_regime = null,
    $id_theme = null
) {
    $this->id_menu = $id_menu;
    $this->titre = $titre;
    $this->description = $description;
    $this->nombre_personnes_min = $nombre_personnes_min;
    $this->prix_par_personne = $prix_par_personne;
    $this->conditions = $conditions;
    $this->stock_disponible = $stock_disponible;
    $this->id_regime = $id_regime;
    $this->id_theme = $id_theme;
}

}