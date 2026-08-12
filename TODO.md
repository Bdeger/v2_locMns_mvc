# 📋 TODO — LOC MNS
> Projet Fil Rouge DWWM — Metz Numeric School 2025-2026
> Dernière mise à jour : 12 août 2026 — Soutenance : octobre 2026

---

## ✅ Déjà réalisé

### Architecture
- [x] Architecture MVC PHP (Controllers, Models, Views, Router)
- [x] Système de routing dynamique dans `index.php`
- [x] Connexion à la BDD via PDO (`Manager.php`)
- [x] Layout responsive mobile first (CSS)
- [x] Organisation des fichiers CSS en dossiers (`css/admin/`, `css/user/`)
- [x] Gestion des branches Git (`main` + `materiel-v2`)

### Authentification
- [x] Page d'accueil (home) + Page de connexion (`auth/login`)
- [x] Authentification avec hashage mot de passe (`password_hash`)
- [x] Déconnexion — méthode `logout()` dans `AuthController` + lien sidebar
- [x] Session complète (id, nom, prénom, email, rôle)
- [x] Redirection automatique selon le rôle (via `id_role`, pas le libellé)

### Côté admin
- [x] Dashboard admin avec stats et derniers emprunts
- [x] Sidebar admin responsive (mobile burger + desktop fixe)
- [x] CRUD Matériel complet (liste, ajouter, modifier, supprimer)
- [x] Badges de statut colorés (Disponible, Emprunté, En maintenance, Hors service)
- [x] Page Membres — liste avec avatars initiales
- [x] Ajout d'un membre (formulaire + insertion BDD)

### Côté emprunteur
- [x] `UserController` + route `/user/accueil`
- [x] Page accueil emprunteur (catalogue du matériel)
- [x] Navbar emprunteur dédiée avec menu burger responsive
- [x] Affichage des matériels depuis la BDD (`getAllMateriel()`)

### Base de données
- [x] Table `statut_utilisateur` avec 3 états (Actif, Inactif, Suspendu)
- [x] Champ `commentaire` dans la table utilisateur
- [x] `emprunt.id_materiel` passé en NULL + ajout `id_categorie` (demande souple)

---

## 🔥 Prioritaire — Cœur du projet

### Emprunts — côté emprunteur
- [ ] `EmpruntController` + `EmpruntManager`
- [ ] Route `/emprunt/demander/{id}` (le bouton pointe déjà dessus)
- [ ] Formulaire de demande (dates début / fin souhaitées)
- [ ] Validation PHP : au moins `id_materiel` OU `id_categorie` renseigné
- [ ] Insertion en BDD avec statut « En attente »
- [ ] Page « Mes emprunts » — demandes en cours et leur statut
- [ ] Demande par **catégorie** sans matériel imposé (V2)

### Emprunts — côté admin
- [ ] Liste des demandes (En attente, En cours, Terminé, Refusé)
- [ ] Actions : Valider / Refuser / Marquer comme rendu
- [ ] Assignation d'un matériel précis lors de la validation
- [ ] `UPDATE` statut emprunt + `UPDATE` état matériel en simultané
- [ ] Motif de refus obligatoire si refus

### Catalogue emprunteur
- [ ] Filtre par catégorie (pastilles cliquables)
- [ ] Barre de recherche fonctionnelle
- [ ] Compteur de matériels par catégorie

---

## 🔒 Sécurité — À faire avant la soutenance

> ⚠️ Reporté volontairement, mais **incontournable** : le jury testera l'accès direct par URL.

- [ ] `checkAuth()` dans `Controller.php` (classe parente)
- [ ] `checkAdmin()` pour les routes d'administration
- [ ] Appel sur toutes les pages protégées
- [ ] Protection CSRF sur tous les formulaires
- [ ] Désactiver l'affichage des erreurs PHP en production
- [ ] Supprimer `hash.php` et `test_db.php` avant mise en ligne
- [ ] Sortir les identifiants BDD de `config/database.php` (variables d'environnement)

---

## 🧹 Refactorisation

- [ ] Factoriser les styles communs admin / user dans `style.css`
  - [ ] Styles de boutons dupliqués
  - [ ] Badges d'état répétés
  - [ ] Styles de formulaires
- [ ] Vérifier les chemins d'images (`/public/image/` vs `/image/`)
- [ ] `<h1>` unique par page (celui de la navbar en `<p>` ou `<h2>`)
- [ ] Nommage cohérent des variables (`$materielManager` vs `$listMateriel`)
- [ ] Corriger l'inversion nom/prénom du membre id 2 en BDD

---

## 💡 Améliorations (si le temps le permet)

### Sidebar
- [ ] Lien sur le logo LocMns → page d'accueil

### Page Membres
- [ ] Champs confirmation email + confirmation mot de passe
- [ ] Mode desktop : cartes de même taille
- [ ] JS pour afficher/masquer le commentaire (voir plus)
- [ ] Champ téléphone avec sélecteur de code pays (API externe)
- [ ] Page détail membre avec adresse postale + historique emprunts
- [ ] Vérifier conformité RGPD pour l'adresse postale
- [ ] Page protégée de création d'un compte administrateur

### UX
- [ ] Toggle afficher / masquer le mot de passe (login)
- [ ] Modal de confirmation avant suppression matériel
  - Afficher le nom + modèle du matériel à supprimer
  - Message de succès après suppression
- [ ] Messages flash (succès / erreur) après chaque action

---

## ⭐ Bonus (fonctionnalités avancées)

### Calendrier FullCalendar
- [ ] Intégration bibliothèque JS open source
- [ ] Données emprunts passées en JSON depuis PHP
- [ ] Vue mensuelle : qui a emprunté quoi et quand
- [ ] Calendrier de disponibilités type Airbnb côté emprunteur

### Veille technologique
- [ ] Composant React via CDN (intl-tel-input ou autocomplétion d'adresse)

### Autres
- [ ] Export CSV/XML des comptes utilisateurs
- [ ] Système d'alerte (retard retour matériel, nouvelle demande)
- [ ] Gestion documentaire (notice, doc technique sur un matériel)

---

## 📚 Préparation soutenance (Août — Octobre)

- [ ] Révision des process techniques avec schémas
  - [ ] Flux MVC : Router → Controller → Manager → BDD → View
  - [ ] Cycle de la requête HTTP
  - [ ] Fonctionnement des sessions
  - [ ] Requêtes préparées PDO
- [ ] Dossier projet (30-50 pages selon REAC DWWM)
- [ ] PowerPoint de présentation (35 min)
- [ ] Jeu d'essai de la fonctionnalité principale (emprunt)
- [ ] Veille sécurité (XSS, CSRF, injections SQL)
- [ ] Vidéo démo courte (intro projecteur 10s + démo fonctionnalités)
- [ ] Répétition de la présentation orale

### Justifications à préparer pour le jury
- [ ] Pourquoi la redirection s'appuie sur `id_role` et non sur le libellé
- [ ] Pourquoi `id_materiel` est nullable (demande sans matériel imposé)
- [ ] Pourquoi la règle « au moins un des deux » est en PHP et non en SQL
- [ ] Pourquoi les alias SQL (`AS role`) évitent les collisions de clés

---

> *Confidentiel — Ne pas diffuser*
> *LOC MNS — Projet DEVWEB / CDA 2025-2026*