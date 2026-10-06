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

// GETTERS

public function getIdMenu()
{
    return $this->id_menu;
}

public function getTitre()
{
    return $this->titre;
}

public function getDescription()
{
    return $this->description;
}

public function getNombrePersonnesMin()
{
    return $this->nombre_personnes_min;
}

public function getPrixParPersonne()
{
    return $this->prix_par_personne;
}

public function getConditions()
{
    return $this->conditions;
}

public function getStockDisponible()
{
    return $this->stock_disponible;
}

public function getIdRegime()
{
    return $this->id_regime;
}

public function getIdTheme()
{
    return $this->id_theme;
}


// SETTERS

public function setIdMenu($id_menu)
{
    $this->id_menu = $id_menu;
}

public function setTitre($titre)
{
    $this->titre = $titre;
}

public function setDescription($description)
{
    $this->description = $description;
}

public function setNombrePersonnesMin($nombre_personnes_min)
{
    $this->nombre_personnes_min = $nombre_personnes_min;
}

public function setPrixParPersonne($prix_par_personne)
{
    $this->prix_par_personne = $prix_par_personne;
}

public function setConditions($conditions)
{
    $this->conditions = $conditions;
}

public function setStockDisponible($stock_disponible)
{
    $this->stock_disponible = $stock_disponible;
}

public function setIdRegime($id_regime)
{
    $this->id_regime = $id_regime;
}

public function setIdTheme($id_theme)
{
    $this->id_theme = $id_theme;
}

}