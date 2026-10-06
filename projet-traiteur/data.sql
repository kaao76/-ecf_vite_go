INSERT INTO Role (libelle)
VALUES
('Utilisateur'),
('Employé'),
('Administrateur');

INSERT INTO Regime (libelle)
VALUES
('Classique'),
('Végétarien'),
('Vegan');

INSERT INTO Theme (libelle)
VALUES
('Classique'),
('Événement'),
('Noël'),
('Pâques');

INSERT INTO Menu (
    titre,
    description,
    nombre_personnes_min,
    prix_par_personne,
    conditions,
    stock_disponible,
    id_regime,
    id_theme
)
VALUES
(
    'Menu Classique',
    'Des saveurs fines et équilibrées pour un moment raffiné.',
    4,
    32.00,
    'Minimum 4 personnes. Commande au moins 48 h à l’avance. Sous réserve de disponibilité des produits.',
    20,
    1,
    1
),
(
    'Menu Gourmand',
    'Le plaisir des bons produits sélectionnés avec soin.',
    6,
    38.00,
    'Minimum 6 personnes. Commande au moins 48 h à l’avance. Sous réserve de disponibilité des produits.',
    15,
    1,
    2
),
(
    'Menu Prestige',
    'Une expérience culinaire unique pour un moment inoubliable.',
    8,
    45.00,
    'Minimum 8 personnes. Commande au moins 72 h à l’avance. Sous réserve de disponibilité des produits.',
    10,
    1,
    2
);

INSERT INTO Plat (titre, description, type_plat)
VALUES
(
    'Salade de chèvre chaud, noix et miel',
    'Salade de chèvre chaud accompagnée de noix et de miel.',
    'Entrée'
),
(
    'Suprême de poulet rôti, sauce aux champignons',
    'Suprême de poulet rôti accompagné d’une sauce aux champignons.',
    'Plat'
),
(
    'Tarte fine aux pommes, caramel beurre salé',
    'Tarte fine aux pommes accompagnée de caramel au beurre salé.',
    'Dessert'
),
(
    'Pavé de saumon rôti, sauce citronnée',
    'Pavé de saumon rôti accompagné d’une sauce citronnée.',
    'Plat'
),
(
    'Moelleux au chocolat, cœur coulant',
    'Moelleux au chocolat avec un cœur coulant.',
    'Dessert'
),
(
    'Saumon fumé, crème citronnée et blinis',
    'Saumon fumé accompagné de crème citronnée et de blinis.',
    'Entrée'
),
(
    'Filet de bœuf, sauce aux morilles',
    'Filet de bœuf accompagné d’une sauce aux morilles.',
    'Plat'
);

INSERT INTO Allergene (libelle)
VALUES
('Lait'),
('Fruits à coque'),
('Gluten'),
('Œufs'),
('Poissons');

INSERT INTO PlatAllergene (id_plat, id_allergene)
VALUES
(1, 1), -- Salade de chèvre → Lait
(1, 2), -- Salade de chèvre → Fruits à coque

(2, 1), -- Poulet → Lait

(3, 3), -- Tarte → Gluten
(3, 1), -- Tarte → Lait

(4, 5), -- Saumon → Poissons
(4, 1), -- Saumon → Lait

(5, 3), -- Moelleux → Gluten
(5, 4), -- Moelleux → Œufs
(5, 1), -- Moelleux → Lait

(6, 5), -- Saumon fumé → Poissons
(6, 3), -- Blinis → Gluten
(6, 1), -- Crème → Lait
(6, 4), -- Blinis → Œufs

(7, 1); -- Sauce aux morilles → Lait

INSERT INTO MenuPlat (id_menu, id_plat)
VALUES
-- Menu Classique
(1, 1),
(1, 2),
(1, 3),

-- Menu Gourmand
(2, 1),
(2, 4),
(2, 5),

-- Menu Prestige
(3, 6),
(3, 7),
(3, 5);