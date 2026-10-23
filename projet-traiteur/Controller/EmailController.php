<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController
{
    public function envoyerBienvenue($email, $prenom)
    {
        // Récupérer la configuration SMTP
        $config = require __DIR__ . '/../config/mail.php';

        // Créer un objet PHPMailer
        $mail = new PHPMailer(true);

        // Choisir SMTP comme méthode d'envoi
        $mail->isSMTP();

        // Configurer le serveur et le port

        $mail->Host = $config['host']; /* « Dans mon objet $mail, 
        affecte à la propriété Host l'adresse du serveur SMTP récupérée dans mon tableau de configuration $config. »
        $mail->Port = $config['port']; */



        // Activer l'authentification SMTP

         /* « Active l'authentification SMTP, puis utilise le nom d'utilisateur
          et le mot de passe présents dans mon fichier de configuration pour te connecter au serveur. » */
        $mail->SMTPAuth = true;
        $mail->Username = $config['username'];
        $mail->Password = $config['password'];
        

        // Sécuriser la connexion avec STARTTLS
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; /* activer le chiffrement TLS / SMTPSecure propeiété dans phpmailer */




        // Définir l'expéditeur

        /* « Sur mon objet $mail, appelle la méthode setFrom() 
        et donne-lui l'adresse e-mail et le nom de l'expéditeur 
        récupérés dans le fichier de configuration. » */

        $mail->setFrom(
            $config['from_email'],
            $config['from_name']
        );

        // Définir le destinataire
        /* « Sur mon objet $mail, appelle la méthode addAddress() 
        pour ajouter comme destinataire l'adresse contenue dans la variable $email. » */

        $mail->addAddress($email);


        // Préparer un e-mail au format HTML
        $mail->isHTML(true); /* « Sur mon objet $mail, active le format HTML pour pouvoir afficher des titres, des paragraphes et du texte en gras dans mon e-mail. » */
        $mail->CharSet = 'UTF-8';

        // Définir le sujet
        /* « Dans mon objet $mail, affecte à 
        la propriété Subject le texte “Bienvenue chez Vite & Gourmand !”, qui sera le sujet de l'e-mail. » */
        $mail->Subject = 'Bienvenue chez Vite & Gourmand !';


        // Sécuriser le prénom pour l'affichage HTML
        /*« Prends le prénom contenu dans $prenom, 
        transforme ses caractères spéciaux pour qu'ils puissent être affichés comme du texte dans du HTML, 
        puis enregistre le résultat dans $prenomSecurise. » */
        $prenomSecurise = htmlspecialchars(
            $prenom,
            ENT_QUOTES,
            'UTF-8'
        );


        // Construire le message personnalisé
        /* « Affecte à la propriété Body de mon objet $mail 
        le contenu HTML que je vais écrire entre les guillemets doubles. » */

        $mail->Body = "
    <h1>Bienvenue chez Vite & Gourmand !</h1>

    <p>Bonjour {$prenomSecurise},</p>

    <p>
        Nous sommes ravis de vous accueillir
        chez Vite & Gourmand.
    </p>

    <p>
        Votre compte a bien été créé.
        Vous pouvez désormais découvrir nos menus
        et profiter de nos services.
    </p>

    <p>À très bientôt !</p>

    <p><strong>L'équipe Vite & Gourmand</strong></p>
";

        // Prévoir une version texte de l'e-mail
        /* « Affecte à la propriété AltBody de mon objet $mail 
        une version alternative du message, au format texte brut. » */

        $mail->AltBody =
            "Bonjour {$prenom},\n\n"
            . "Bienvenue chez Vite & Gourmand !\n"
            . "Votre compte a bien été créé.\n\n"
            . "À très bientôt !\n"
            . "L'équipe Vite & Gourmand";

        // Envoyer l'e-mail et gérer les erreurs
        try {
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log(
                'Erreur envoi e-mail de bienvenue : ' . $e->getMessage()
            );

            // Diagnostic temporaire
            echo "Erreur SMTP : " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');

            return false;
        }
    }
}
