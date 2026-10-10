
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
}
