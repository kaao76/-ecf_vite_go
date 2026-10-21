<?php

// Démarrer la session si elle n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../Controller/InscriptionController.php';
require_once __DIR__ . '/includes/header.php';
?>

<!-- Contenu de la page inscription -->
<div class="page-inscription">

    <!-- Zone d'inscription et de connexion -->
    <section class="authentification">

        <!-- Conteneur des panneaux coulissants -->
        <div class="authentification-conteneur">

            <!-- Panneau du formulaire d'inscription -->
            <div class="auth-formulaire-inscription">

                <h1>Créer votre compte</h1>

                <p>
                    Rejoignez Vite & Gourmand et profitez de nos menus
                    et de nos événements privés et professionnels.
                </p>
                <!-- Formulaire d'inscription -->
                <form action="" method="POST">
                    <?php if (!empty($messageInscription)): ?>
                        <p class="message-inscription <?= $messageInscription === "Votre compte a été créé avec succès !" ? 'message-succes' : 'message-erreur' ?>">
                            <?= htmlspecialchars($messageInscription, ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    <?php endif; ?>



                    <!-- Nom -->
                    <div class="auth-champ">
                        <label for="nom">Nom *</label>
                        <input
                            type="text"
                            id="nom"
                            name="nom"
                            placeholder="Votre nom"
                            maxlength="50"
                            autocomplete="family-name"
                            value="<?= htmlspecialchars($_POST['nom'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            required>
                    </div>

                    <!-- Prénom -->
                    <div class="auth-champ">
                        <label for="prenom">Prénom *</label>
                        <input
                            type="text"
                            id="prenom"
                            name="prenom"
                            placeholder="Votre prénom"
                            maxlength="50"
                            autocomplete="given-name"
                            value="<?= htmlspecialchars($_POST['prenom'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            required>
                    </div>
                    <!-- Téléphone -->
                    <div class="auth-champ">
                        <label for="telephone">Téléphone *</label>
                        <input
                            type="tel"
                            id="telephone"
                            name="telephone"
                            placeholder="06 12 34 56 78"
                            maxlength="20"
                            autocomplete="tel"
                            value="<?= htmlspecialchars($_POST['telephone'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            required>
                    </div>

                    <!-- E-mail -->
                    <div class="auth-champ">
                        <label for="email">E-mail *</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="exemple@domaine.fr"
                            maxlength="100"
                            autocomplete="email"
                            value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            required>
                    </div>
                    <!-- Adresse postale -->
                    <div class="auth-champ">
                        <label for="adresse">Adresse postale *</label>
                        <input
                            type="text"
                            id="adresse"
                            name="adresse"
                            placeholder="Votre adresse complète"
                            maxlength="255"
                            autocomplete="street-address"
                            value="<?= htmlspecialchars($_POST['adresse'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            required>
                    </div>

                    <!-- Ville -->
                    <div class="auth-champ">
                        <label for="ville">Ville *</label>
                        <input
                            type="text"
                            id="ville"
                            name="ville"
                            placeholder="Votre ville"
                            maxlength="50"
                            autocomplete="address-level2"
                            value="<?= htmlspecialchars($_POST['ville'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            required>
                    </div>

                    <!-- Pays -->
                    <div class="auth-champ">
                        <label for="pays">Pays *</label>
                        <input
                            type="text"
                            id="pays"
                            name="pays"
                            placeholder="Votre pays"
                            maxlength="50"
                            autocomplete="country-name"
                            value="<?= htmlspecialchars($_POST['pays'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                            required>
                    </div>
                    <!-- Mot de passe -->
                    <div class="auth-champ">
                        <label for="mot_de_passe">Mot de passe *</label>
                        <input
                            type="password"
                            id="mot_de_passe"
                            name="mot_de_passe"
                            placeholder="Votre mot de passe"
                            minlength="12"
                            maxlength="72"
                            autocomplete="new-password"
                            required>
                    </div>

                    <!-- Confirmation du mot de passe -->
                    <div class="auth-champ">
                        <label for="confirmation">Confirmer le mot de passe *</label>
                        <input
                            type="password"
                            id="confirmation"
                            name="confirmation"
                            placeholder="Confirmez votre mot de passe"
                            minlength="12"
                            maxlength="72"
                            autocomplete="new-password"
                            required>
                    </div>
                    <!-- Acceptation des conditions -->
                    <div class="auth-conditions">

                        <input
                            type="checkbox"
                            id="acceptation_conditions"
                            name="acceptation_conditions"
                            value="1"
                            <?= isset($_POST['acceptation_conditions']) ? 'checked' : '' ?>
                            required>

                        <label for="acceptation_conditions">
                            J'ai lu et j'accepte les
                            <a href="conditions.php">conditions générales</a>
                            et la
                            <a href="confidentialite.php">politique de confidentialité</a>.
                        </label>

                    </div>

                    <!-- Bouton d'inscription -->
                    <div class="auth-action">

                        <button type="submit" name="inscription" value="1" class="bouton">
                            Créer mon compte
                            <span aria-hidden="true">→</span>
                        </button>

                    </div>
                </form>
                <!-- Lien vers la connexion -->
                <p class="auth-lien-connexion">
                    Déjà un compte ?
                    <a href="#" id="afficher-connexion">Se connecter</a>
                </p>

            </div>



            <!-- Panneau du formulaire de connexion -->
            <div class="auth-formulaire-connexion">

                <h2>Heureux de vous retrouver</h2>

                <p>
                    Connectez-vous à votre compte Vite & Gourmand
                    pour retrouver vos commandes et vos menus.
                </p>
                <!-- Formulaire de connexion -->
                <form action="" method="POST">

                    <!-- E-mail -->
                    <div class="auth-champ">
                        <label for="email-connexion">E-mail *</label>
                        <input
                            type="email"
                            id="email-connexion"
                            name="email"
                            placeholder="Votre adresse e-mail"
                            autocomplete="email"
                            required>
                    </div>

                    <!-- Mot de passe -->
                    <div class="auth-champ">
                        <label for="mot-de-passe-connexion">Mot de passe *</label>
                        <input
                            type="password"
                            id="mot-de-passe-connexion"
                            name="mot_de_passe"
                            placeholder="Votre mot de passe"
                            autocomplete="current-password"
                            required>
                    </div>
                    <!-- Lien mot de passe oublié -->
                    <p class="auth-mot-de-passe-oublie">
                        <a href="mot-de-passe-oublie.php">
                            Mot de passe oublié ?
                        </a>
                    </p>


                    <!-- Bouton de connexion -->
                    <div class="auth-action">

                        <button type="submit" class="bouton">
                            Se connecter
                            <span aria-hidden="true">→</span>
                        </button>

                    </div>

                </form>
                <!-- Lien vers l'inscription -->
                <p class="auth-lien-inscription">
                    Pas encore de compte ?
                    <a href="#" id="afficher-inscription">S'inscrire</a>
                </p>

            </div>
            <!-- Panneau photographique coulissant -->
            <div class="auth-panneau-photo">

                <!-- Textes et boutons du panneau photographique -->
                <div class="auth-photo-contenu">

                    <!-- Message affiché côté connexion -->
                    <div class="auth-photo-nouveau">
                        <h2>Nouveau chez nous ?</h2>

                        <p>
                            Rejoignez Vite & Gourmand et découvrez
                            une expérience gourmande unique.
                        </p>

                        <button type="button" id="auth-bouton-inscription">
                            Sign Up
                        </button>
                    </div>

                    <!-- Message affiché côté inscription -->
                    <div class="auth-photo-deja-compte">
                        <h2>Déjà un compte ?</h2>

                        <p>
                            Retrouvez vos commandes et vos menus
                            en vous connectant à votre espace.
                        </p>

                        <button type="button" id="auth-bouton-connexion">
                            Sign In
                        </button>
                    </div>

                </div>
            </div> <!-- Fin du panneau photographique -->

        </div> <!-- Fin du conteneur des panneaux coulissants -->

    </section> <!-- Fin de la section authentification -->

</div>
<script src="../Js/authentification.js" defer></script>

<?php require_once 'includes/footer.php'; ?>