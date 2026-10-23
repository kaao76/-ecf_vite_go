<?php

class HeaderController
{
    public function estConnecte()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION['id_utilisateur']); // Vérification de l'identifiant

    }

    public function estClient()
{
    return isset($_SESSION['role_id']) // vérifie si le rôle existe dans la session.
        && (int) $_SESSION['role_id'] === 1; // vérifie que le rôle correspond à un client.
}
}

$headerController = new HeaderController();
$estConnecte = $headerController->estConnecte(); //indique si l'utilisateur est connecté.
$estClient = $headerController->estClient(); // indique si l'utilisateur possède le rôle client.