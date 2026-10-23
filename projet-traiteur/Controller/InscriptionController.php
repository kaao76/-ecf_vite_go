<?php

require_once __DIR__ . '/../entity/Utilisateur.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/EmailController.php';

class InscriptionController
{
    public function inscrire()
    {
        /* Accéder à la variable globale $pdo pour la connexion à la base de données. */
        global $pdo;


        /* Récupérer les données du formulaire d'inscription. */
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $telephone = $_POST['telephone'] ?? '';
        $email = $_POST['email'] ?? '';
        $adresse = $_POST['adresse'] ?? '';
        $ville = $_POST['ville'] ?? '';
        $pays = $_POST['pays'] ?? '';
        $mot_de_passe = $_POST['mot_de_passe'] ?? '';
        $confirmation = $_POST['confirmation'] ?? '';
        $acceptation_conditions = isset($_POST['acceptation_conditions']); /* ici on utilise isset car c'est une checkbox, donc si elle n'est pas cochée, elle ne sera pas présente dans $_POST */

        /* vérification des champs obligatoires.*/
        if (
            empty(trim($nom)) ||
            empty(trim($prenom)) ||
            empty(trim($telephone)) ||
            empty(trim($email)) ||
            empty(trim($adresse)) ||
            empty(trim($ville)) ||
            empty(trim($pays)) ||
            empty($mot_de_passe) ||
            empty($confirmation)
        ) {
            $message = "Erreur : tous les champs sont obligatoires.";
            return $message;
        }


        /*Vérifier le format de l'adresse e-mail */

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Erreur : l'adresse e-mail est invalide.";
            return $message;
        }

        /* vérifier la longueur du mot de passe. */
        if (strlen($mot_de_passe) < 12) {
            $message = "Erreur : le mot de passe doit contenir au moins 12 caractères.";
            return $message;
        }

        /* Vérifier que le mot de passe et la confirmation correspondent. */
        if ($mot_de_passe !== $confirmation) {
            $message = "Erreur : les mots de passe ne correspondent pas.";
            return $message;
        }

        /* Vérifier que l'utilisateur a accepté les conditions générales. */
        if (!$acceptation_conditions) {
            $message = "Erreur : vous devez accepter les conditions générales.";
            return $message;
        }

        /* Vérifier si l'utilisateur existe déjà dans la base de données. */

        $sql = "SELECT id_utilisateur FROM Utilisateur WHERE email = :email LIMIT 1";

        $stmt = $pdo->prepare($sql);

        $stmt->execute(['email' => $email]); /* execut. la requete en transmettant la valeur de $email au paramètre :email */

        $utilisateurExistant = $stmt->fetch();

        /* Empêcher l'inscription si l'adresse e-mail existe déjà. */
        if ($utilisateurExistant) {
            $message = "Erreur : cette adresse e-mail est déjà utilisée.";
            return $message;
        }
        /* Hacher le mot de passe avant son enregistrement en BDD. */
        $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        /* Préparer la requête SQL pour enregistrer un nouvel utilisateur. */

        $sql = "INSERT INTO Utilisateur
        (nom, prenom, telephone, email, adresse, mot_de_passe, ville, pays, role_id, actif)
        VALUES
        (:nom, :prenom, :telephone, :email, :adresse, :mot_de_passe, :ville, :pays, :role_id, :actif)";

        $stmt = $pdo->prepare($sql);
        /* Exécuter la requête pour enregistrer l'utilisateur. */

        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'telephone' => $telephone,
            'email' => $email,
            'adresse' => $adresse,
            'mot_de_passe' => $mot_de_passe_hache,
            'ville' => $ville,
            'pays' => $pays,
            'role_id' => 1,
            'actif' => 1
        ]);



        $idUtilisateur = $pdo->lastInsertId();

        // Renouveler l'identifiant de session
        session_regenerate_id(true);

        // Enregistrer les informations du nouvel utilisateur
        $_SESSION['id_utilisateur'] = (int) $idUtilisateur;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['role_id'] = 1;

        // Envoyer un e-mail de bienvenue après l'inscription
        $emailController = new EmailController(); /* « PHP, crée-moi un objet de la classe EmailController,
         que je pourrai utiliser pour envoyer des e-mails. » */
        $emailController->envoyerBienvenue($email, $prenom); /* Objet $emailController, exécute ta méthode envoyerBienvenue() 
        avec l'adresse e-mail et le prénom du nouvel utilisateur. » */


        // Rediriger vers l'espace personnel
        header('Location: espace_personnel.php');
        exit;
    }
}


// Détecter l'envoi du formulaire d'inscription
$messageInscription = '';
                                    /* Est-ce que le formulaire envoyé contient un élément appelé inscription ? » */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inscription'])) {
    $controller = new InscriptionController();
    $messageInscription = $controller->inscrire();
}
