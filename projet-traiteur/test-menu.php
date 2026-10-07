<?php

require_once 'entity/Menu.php';

$menu = new Menu(
    1,
    "Menu Classique",
    "Des saveurs fines et équilibrées pour un moment raffiné.",
    4,
    32.00,
    "Minimum 4 personnes. Commande au moins 48 h à l’avance.",
    20,
    1,
    1
);

echo $menu->getTitre();