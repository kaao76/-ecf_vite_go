
<?php

require_once __DIR__ . '/../config/database.php';

class ConnexionController
{
    public function connecter()
    {
        $email = trim($_POST['email'] ?? '');
        $motDePasse = $_POST['mot_de_passe'] ?? '';

        if ($email === '' || $motDePasse === '') {
            return "Veuillez remplir tous les champs.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Veuillez saisir une adresse e-mail valide.";
        }

        // Accéder à la connexion PDO

        global $pdo;


        // Préparer la recherche de l'utilisateur
        $sql = "SELECT * FROM Utilisateur WHERE email = :email";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);

        // Récupérer l'utilisateur trouvé
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC); /* FETH ASSOC demande à PDO de recupérer les infos de l utilisateur sous forme de tableau associatif */



        /* vérifier l email car $utilisateur a récupéré email */
        if ($utilisateur === false) {
            return "Adresse e-mail ou mot de passe incorrect.";
        }

        /* Vérifier le mot de passe */
        if (!password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
            return "Adresse e-mail ou mot de passe incorrect.";
        }

        /* Vérifier si le compte est actif */
        if ((int) $utilisateur['actif'] !== 1) {
            return "Ce compte est désactivé.";
        }

        /* Mot de passe correct et compte actif */

        // Renouveler l'identifiant de session
        session_regenerate_id(true);
        // Enregistrer les informations de l'utilisateur connecté
        $_SESSION['id_utilisateur'] = (int) $utilisateur['id_utilisateur'];
        $_SESSION['prenom'] = $utilisateur['prenom'];
        $_SESSION['role_id'] = (int) $utilisateur['role_id'];

        // Redirection selon le rôle de l'utilisateur
        if ($_SESSION['role_id'] === 1) {
            header('Location: espace_personnel.php');
        } else {
            header('Location: index.php');
        }

        exit;
    }
}


// Détecter l'envoi du formulaire de connexion créer l'objet InscriptionController et d'appeler sa méthode inscrire().
$messageConnexion = ''; /* Nous créons une variable vide qui recevra le message retourné par la méthode connecter(). */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['connexion'])) {
    $controller = new ConnexionController();
    $messageConnexion = $controller->connecter();
}
