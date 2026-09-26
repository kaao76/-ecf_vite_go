Etape 1: BDD==>

### 1-Déterminer les entités (entités determinées au début):
-Utilisateur: Pour gérer les comptes des clients, leurs informations personnelles et leur connexion au site.
-Role : Pour distinguer les différents types de comptes : utilisateur, employé, administrateur.
-Commande: Pour enregistrer une commande et toutes les informations générales liées à celle-ci : client, date, livraison, prix, statut, etc.
-LigneCommande:  Pour représenter le contenu d'une commande : quels menus sont commandés, en quelle quantité et à quel prix.
-Menu : Pour enregistrer les menus proposés à la vente : titre, description, prix, nombre de personnes, stock, etc.
-Plat : Pour enregistrer les différents plats qui peuvent composer les menus.
-Allergene : Pour gérer les allergènes associés aux plats.
-Avis : Pour enregistrer les notes et commentaires laissés par les utilisateurs.
-Horaire : Pour enregistrer les horaires d'ouverture du service.
-DemandeContact : Pour enregistrer les messages envoyés depuis le formulaire de contact du site.
-Regime : Pour gérer les différents régimes associés aux menus et permettre leur filtrage.
-Theme : Pour gérer les thèmes des menus et permettre leur filtrage.
-Image : Pour gérer les différentes images utilisées sur le site : menus, plats, équipe, etc.

 
 tables intermediaires : - MenuPlat - PlatAllergene
 
### 2-Détermnier les colonnes de chaque table: 
-Utilisateur: id_utilisateur (PK), nom, prénom, telephonne, email, adresse, mot_de_passe, ville, pays,  role_id (FK), actif.

-Menu: id_menu (PK), titre, description, nombre_personnes_min, prix_par_personne, conditions, stock_disponible, id_regime, id_theme

-Plat: id_plat, titre, description, type_plat (entree, plat, dessert).
-LigneCommande: id_ligne_commande, id_commande (Fk), id_menu (FK), quantite, prix_unitaire
-Allergene: id_allergene, libelle

-Commande: id_commande  (PK), date_commande ,date_prestation heure_livraison lieu_livraison adresse_livraison nombre_personnes prix_menu prix_livraison prix_total statut pret_materiel restitution_materiel id_utilisateur    (FK)

-Avis: id_avis (PK), note, commentaire, statut, id_utilisateur (FK)
-Horaire: id_horaire, jour, heure_ouverture, heure_fermeture
-DemandeContact: id_demande, titre, description, email, date_demande, statut (à confirmer avant d'en faire une table).

-role: id_role - libelle
-regime: id_regime (PK), libelle
-Theme: id_theme (pk), libelle
-MenuPlat: id_menu  PK + FK , id_plat    PK + FK (N–N → table intermédiaire. )
-PlatAllergene: id_plat (PK + FK), id_allergene PK + FK (Plat N ↔ N Allergene table intermédiaire.)
Image: id_image (PK), url_image, type


### 3-Determiner les relations entre les tables,
Utilisateur → Commande  ok
Commande ↔ LigneCommande
Menu ↔ LigneCommande

Menu ↔ Plat   ok
Plat ↔ Allergène  ok
Utilisateur → Avis  ok
Menu ↔ Theme
Menu ↔ Regime
Utilisateur ↔ Role
Horaire → aucune relation identifiée
image : aucune relation identifiée

## LigneCommande :
On relie Commande et Menu parce qu'une commande doit savoir quels menus ont été commandés. LigneCommande sert d'intermédiaire pour enregistrer chaque menu, sa quantité et son prix.

### 4-Determiner les cardinalités
-Utilisateur ↔ Commande → (0,N) — (1,1) : Un utilisateur peut avoir 0 à plusieurs commandes ; une commande appartient à un seul utilisateur.


Utilisateur ↔ Avis → (0,N) — (1,1)
Un utilisateur peut avoir 0 à plusieurs avis ; un avis appartient à un seul utilisateur.

Commande ↔ LigneCommande → (1,N) — (1,1)
Une commande contient au moins une ligne de commande ; une ligne de commande appartient à une seule commande.

Menu ↔ LigneCommande → (0,N) — (1,1)
Un menu peut apparaître dans 0 à plusieurs lignes de commande ; une ligne de commande concerne un seul menu.

Menu ↔ Plat → (1,N) — (0,N) [relation N-N: MenuPlat]
Un menu contient au moins un plat ; un plat peut appartenir à 0 à plusieurs menus.

Plat ↔ Allergène → (0,N) — (0,N)  [relation N-N: PlatAllergene]
Un plat peut avoir 0 à plusieurs allergènes ; un allergène peut concerner 0 à plusieurs plats.

Utilisateur ↔ Role → (1,1) — (0,N)
Un utilisateur possède un seul rôle ; un rôle peut être attribué à 0 à plusieurs utilisateurs.

Menu ↔ Regime → (1,1) — (0,N)
Un menu possède un seul régime ; un régime peut être associé à 0 à plusieurs menus.

Menu ↔ Theme → (1,1) — (0,N)
Un menu possède un seul thème ; un thème peut être associé à 0 à plusieurs menus.

Horaire → aucune relation identifiée actuellement.
Image → aucune relation identifiée actuellement ; la nécessité d'une relation sera vérifiée lors de la conception finale.


### 5-Clés primaires/étrangeres:
Utilisateur : id_utilisateur (PK), role_id (FK) → Role.id_role
Role : id_role (PK)
Commande : id_commande (PK), id_utilisateur (FK) → Utilisateur.id_utilisateur
LigneCommande : id_ligne_commande (PK), id_commande (FK) → Commande.id_commande, id_menu (FK) → Menu.id_menu
Menu : id_menu (PK), id_regime (FK) → Regime.id_regime, id_theme (FK) → Theme.id_theme
Plat : id_plat (PK)
Allergene : id_allergene (PK)
Avis : id_avis (PK), id_utilisateur (FK) → Utilisateur.id_utilisateur
Horaire : id_horaire (PK)
DemandeContact : id_demande (PK)
Regime : id_regime (PK)
Theme : id_theme (PK)
Image : id_image (PK)

Tables intermédiaires des relations N–N
MenuPlat : id_menu (PK + FK) → Menu.id_menu, id_plat (PK + FK) → Plat.id_plat
PlatAllergene : id_plat (PK + FK) → Plat.id_plat, id_allergene (PK + FK) → Allergene.id_allergene


6-Définir les types de données: INT, VARCHAR, DATE, BOOLEAN...

7-Créer le sql de la BDD





