<?php

class EspacePersonnelController
{
    public function verifierConnexion()
    {
    
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['id_utilisateur'])) {
            header('Location: inscription.php');
            exit;
        }
    }
     public function verifierRoleClient()
    {
        if (!isset($_SESSION['role_id']) || (int) $_SESSION['role_id'] !== 1) {
            http_response_code(403);
            exit('Accès interdit : espace réservé aux clients.');
        }
    }
}

$controller = new EspacePersonnelController();
$controller->verifierConnexion(); //vérifie la connexion et démarre la session si nécessaire.
$controller->verifierRoleClient(); // vérifie ensuite que $_SESSION['role_id'] correspond à un client.