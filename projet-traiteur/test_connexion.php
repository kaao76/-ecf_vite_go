
<?php
// Démarrer la session si elle n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/Controller/ConnexionController.php';

$_POST['email'] = 'lamia@gmail.com';
$_POST['mot_de_passe'] = 'Kaouthar199519@..';
$controller = new ConnexionController();

$resultat = $controller->connecter();


echo $resultat ?? 'Validation réussie';

