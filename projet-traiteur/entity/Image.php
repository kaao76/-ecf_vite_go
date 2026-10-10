
<?php

class Image
{

    private $id_image;
    private $titre;
    private $url_image;
    private $type;
    private $texte_alternatif;
    private $actif;
    private $id_plat;
    private $id_menu;


    public function __construct(
        $id_image = null,
        $titre = null,
        $url_image = null,
        $type = null,
        $texte_alternatif = null,
        $actif = true,
        $id_plat = null,
        $id_menu = null
    ) {
        $this->id_image = $id_image;
        $this->titre = $titre;
        $this->url_image = $url_image;
        $this->type = $type;
        $this->texte_alternatif = $texte_alternatif;
        $this->actif = $actif;
        $this->id_plat = $id_plat;
        $this->id_menu = $id_menu;
    }

    
    // GETTERS

    public function getIdImage()
    {
        return $this->id_image;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getUrlImage()
    {
        return $this->url_image;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getTexteAlternatif()
    {
        return $this->texte_alternatif;
    }

    public function getActif()
    {
        return $this->actif;
    }

    public function getIdPlat()
    {
        return $this->id_plat;
    }

    public function getIdMenu()
    {
        return $this->id_menu;
    }

    
    // SETTERS

    public function setIdImage($id_image)
    {
        $this->id_image = $id_image;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setUrlImage($url_image)
    {
        $this->url_image = $url_image;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setTexteAlternatif($texte_alternatif)
    {
        $this->texte_alternatif = $texte_alternatif;
    }

    public function setActif($actif)
    {
        $this->actif = $actif;
    }

    public function setIdPlat($id_plat)
    {
        $this->id_plat = $id_plat;
    }

    public function setIdMenu($id_menu)
    {
        $this->id_menu = $id_menu;
    }

}
