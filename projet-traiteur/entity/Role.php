<?php

class Role
{
    private ?int $id_role;
    private string $libelle;

    public function __construct(?int $id_role = null, string $libelle = '')
    {
        $this->id_role = $id_role;
        $this->libelle = $libelle;
    }
}