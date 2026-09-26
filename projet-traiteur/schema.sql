CREATE DATABASE IF NOT EXISTS traiteur;

USE traiteur;

CREATE TABLE Role (
    id_role INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    libelle VARCHAR (50) NOT NULL UNIQUE
);

CREATE TABLE Utilisateur (
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    adresse VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    ville VARCHAR(50) NOT NULL,
    pays VARCHAR(50) NOT NULL,
    role_id INT NOT NULL,
    actif BOOLEAN NOT NULL DEFAULT TRUE,
    FOREIGN KEY (role_id) REFERENCES Role(id_role) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE Regime (
    id_regime INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE Theme (
    id_theme INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE Menu (
    id_menu INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    nombre_personnes_min INT NOT NULL,
    prix_par_personne DECIMAL(10,2) NOT NULL,
    conditions TEXT NOT NULL,
    stock_disponible INT NOT NULL,
    id_regime INT NOT NULL,
    id_theme INT NOT NULL,

    FOREIGN KEY (id_regime)
        REFERENCES Regime(id_regime)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    FOREIGN KEY (id_theme)
        REFERENCES Theme(id_theme)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE Plat (
    id_plat INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    type_plat VARCHAR(20) NOT NULL
);

CREATE TABLE Allergene (
    id_allergene INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE MenuPlat (
    id_menu INT NOT NULL,
    id_plat INT NOT NULL,

    PRIMARY KEY (id_menu, id_plat),

    FOREIGN KEY (id_menu)
        REFERENCES Menu(id_menu)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    FOREIGN KEY (id_plat)
        REFERENCES Plat(id_plat)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE PlatAllergene (
    id_plat INT NOT NULL,
    id_allergene INT NOT NULL,

    PRIMARY KEY (id_plat, id_allergene),

    FOREIGN KEY (id_plat)
        REFERENCES Plat(id_plat)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    FOREIGN KEY (id_allergene)
        REFERENCES Allergene(id_allergene)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE Commande (
    id_commande INT PRIMARY KEY AUTO_INCREMENT,
    date_commande DATETIME NOT NULL,
    date_prestation DATE NOT NULL,
    heure_livraison TIME NOT NULL,
    lieu_livraison VARCHAR(100) NOT NULL,
    adresse_livraison VARCHAR(255) NOT NULL,
    nombre_personnes INT NOT NULL,
    prix_menu DECIMAL(10,2) NOT NULL,
    prix_livraison DECIMAL(10,2) NOT NULL,
    prix_total DECIMAL(10,2) NOT NULL,
    statut VARCHAR(30) NOT NULL,
    pret_materiel BOOLEAN NOT NULL DEFAULT FALSE,
    restitution_materiel BOOLEAN NOT NULL DEFAULT FALSE,
    id_utilisateur INT NOT NULL,

    FOREIGN KEY (id_utilisateur)
        REFERENCES Utilisateur(id_utilisateur)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE LigneCommande (
    id_ligne_commande INT PRIMARY KEY AUTO_INCREMENT,
    id_commande INT NOT NULL,
    id_menu INT NOT NULL,
    quantite INT NOT NULL,
    prix_unitaire DECIMAL(10,2) NOT NULL,

    FOREIGN KEY (id_commande)
        REFERENCES Commande(id_commande)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    FOREIGN KEY (id_menu)
        REFERENCES Menu(id_menu)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE Avis (
    id_avis INT PRIMARY KEY AUTO_INCREMENT,
    note INT NOT NULL,
    commentaire TEXT NOT NULL,
    statut VARCHAR(30) NOT NULL,
    id_utilisateur INT NOT NULL,

    FOREIGN KEY (id_utilisateur)
        REFERENCES Utilisateur(id_utilisateur)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE Horaire (
    id_horaire INT PRIMARY KEY AUTO_INCREMENT,
    jour VARCHAR(20) NOT NULL,
    heure_ouverture TIME NOT NULL,
    heure_fermeture TIME NOT NULL
);


CREATE TABLE DemandeContact (
    id_demande INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    email VARCHAR(100) NOT NULL,
    date_demande DATETIME NOT NULL,
    statut VARCHAR(30) NOT NULL DEFAULT 'nouvelle'
);

CREATE TABLE Image (
    id_image INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(100) NOT NULL,
    url_image VARCHAR(255) NOT NULL,
    type VARCHAR(50) NOT NULL,
    texte_alternatif VARCHAR(255) NOT NULL,
    actif BOOLEAN NOT NULL DEFAULT TRUE
);