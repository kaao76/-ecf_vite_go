<?php

class Utilisateur
{
    // PROPRIÉTÉS

    private ?int $id_utilisateur = null;

    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $telephone = null;
    private ?string $email = null;
    private ?string $adresse = null;
    private ?string $mot_de_passe = null;
    private ?string $ville = null;
    private ?string $pays = null;

    private ?int $role_id = null;
    private bool $actif = true;

    // CONSTRUCTEUR

public function __construct(
    ?string $nom = null,
    ?string $prenom = null,
    ?string $telephone = null,
    ?string $email = null,
    ?string $adresse = null,
    ?string $mot_de_passe = null,
    ?string $ville = null,
    ?string $pays = null
) {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->telephone = $telephone;
    $this->email = $email;
    $this->adresse = $adresse;
    $this->mot_de_passe = $mot_de_passe;
    $this->ville = $ville;
    $this->pays = $pays;
}

// GETTERS

public function getIdUtilisateur(): ?int
{
    return $this->id_utilisateur;
}

public function getNom(): ?string
{
    return $this->nom;
}

public function getPrenom(): ?string
{
    return $this->prenom;
}

public function getTelephone(): ?string
{
    return $this->telephone;
}

public function getEmail(): ?string
{
    return $this->email;
}

public function getAdresse(): ?string
{
    return $this->adresse;
}

public function getMotDePasse(): ?string
{
    return $this->mot_de_passe;
}

public function getVille(): ?string
{
    return $this->ville;
}

public function getPays(): ?string
{
    return $this->pays;
}

public function getRoleId(): ?int
{
    return $this->role_id;
}

public function getActif(): bool
{
    return $this->actif;
}

// SETTERS

public function setIdUtilisateur(?int $id_utilisateur): void
{
    $this->id_utilisateur = $id_utilisateur;
}

public function setNom(?string $nom): void
{
    $this->nom = $nom;
}

public function setPrenom(?string $prenom): void
{
    $this->prenom = $prenom;
}

public function setTelephone(?string $telephone): void
{
    $this->telephone = $telephone;
}

public function setEmail(?string $email): void
{
    $this->email = $email;
}

public function setAdresse(?string $adresse): void
{
    $this->adresse = $adresse;
}

public function setMotDePasse(?string $mot_de_passe): void
{
    $this->mot_de_passe = $mot_de_passe;
}

public function setVille(?string $ville): void
{
    $this->ville = $ville;
}

public function setPays(?string $pays): void
{
    $this->pays = $pays;
}

public function setRoleId(?int $role_id): void
{
    $this->role_id = $role_id;
}

public function setActif(bool $actif): void
{
    $this->actif = $actif;
}
}