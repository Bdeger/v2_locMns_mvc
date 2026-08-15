# 📋 TODO — LOC MNS
> Projet Fil Rouge DWWM — Metz Numeric School 2025-2026
> Dernière mise à jour : 14 août 2026 — Soutenance : octobre 2026

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
- [x] `UserController` + routes `/user/accueil` et `/user/categorie/{id}`
- [x] Navbar emprunteur dédiée avec menu burger responsive
- [x] **Accueil** : 4 tuiles catégories colorées avec comptage des disponibilités
- [x] `CategorieManager` — `getCategoriesAvecCompte()` (COUNT conditionnel + GROUP BY)
- [x] `CategorieManager` — `getCategorieById()`
- [x] **Page catégorie** : en-tête coloré, sélecteur de période, liste filtrée
- [x] `MaterielManager` — `getMaterielDisponibleParCategorie()` (chevauchement de dates)
- [x] Encart « Peu importe le modèle » (demande sans matériel imposé)
- [x] Contraste WCAG vérifié et corrigé sur les tuiles

### Base de données
- [x] Table `statut_utilisateur` avec 3 états (Actif, Inactif, Suspendu)
- [x] Champ `commentaire` dans la table utilisateur
- [x] `emprunt.id_materiel` passé en NULL + ajout `id_categorie` (demande souple)
- [x] Catégorie « Ordinateur portable » renommée « Ordinateur »

---

## 🔥 Prioritaire — Cœur du projet

### Emprunts — côté emprunteur
- [ ] `EmpruntManager` — `addEmprunt()` (INSERT avec statut « En attente »)
- [ ] `EmpruntController` + route `/emprunt/demander`
- [ ] Page de confirmation (récapitulatif avant envoi)
- [ ] Validation PHP : au moins `id_materiel` OU `id_categorie` renseigné
- [ ] Validation des dates (début ≥ aujourd'hui, fin > début)
- [ ] `id_utilisateur` pris dans la session, **jamais** dans un champ caché
- [ ] Page « Mes emprunts » — demandes en cours et leur statut
- [ ] Section « Statut de mes demandes » sur l'accueil (remplit l'espace vide)

### Emprunts — côté admin
- [ ] Liste des demandes (En attente, En cours, Terminé, Refusé)
- [ ] Actions : Valider / Refuser / Marquer comme rendu
- [ ] Assignation d'un matériel précis lors de la validation (cas `id_materiel` NULL)
- [ ] `UPDATE` statut emprunt + `UPDATE` état matériel — **transaction PDO**
- [ ] Motif de refus obligatoire si refus

### Catalogue emprunteur
- [ ] Barre de recherche fonctionnelle (le formulaire existe, pas le traitement)
- [ ] Section « Non disponible sur cette période » (requête inverse)
- [ ] Gérer le cas `/user/categorie/99` (catégorie inexistante → 404 propre)

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

- [ ] **Réviser `categorie.css`** (comprendre et ajuster ligne par ligne)
- [ ] Factoriser les styles communs admin / user dans `style.css`
  - [ ] Styles de boutons dupliqués
  - [ ] Badges d'état répétés
  - [ ] Styles de formulaires
- [ ] Alléger `layout.php` : 5 blocs conditionnels qui répètent `script.js` et la navbar
- [ ] Harmoniser le nommage CSS (convention `bloc-element`, tout en français)
- [ ] Vérifier les chemins d'images (`/public/image/` vs `/image/`)
- [ ] `<h1>` unique par page (celui de la navbar en `<p>` ou `<h2>`)
- [ ] Nommage cohérent des variables (`$materielManager` vs `$listMateriel`)
- [ ] `font-size: 0.4rem` sur `.header-bottom` — règle inutile, à nettoyer
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
- [ ] Catégorie « Autre » pour les matériels hors classification

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
- [ ] Autorisation par profil et par catégorie (mentionné dans le CDC)

---

## 📚 Préparation soutenance (Août — Octobre)

> **Objectif : gel du code fin août.** Septembre = dossiers et répétitions.

- [ ] Révision des process techniques avec schémas
  - [ ] Flux MVC : Router → Controller → Manager → BDD → View
  - [ ] Cycle de la requête HTTP
  - [ ] Fonctionnement des sessions
  - [ ] Requêtes préparées PDO
- [ ] Dossier projet (30-50 pages selon REAC DWWM)
- [ ] Dossier professionnel
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
- [ ] **La localisation est une donnée calculée**, pas un champ figé
      (stockage si disponible, emprunteur si emprunté) — réponse au CDC
- [ ] La détection de chevauchement de dates
      (`debut <= fin_demandee AND fin >= debut_demandee`)
- [ ] Pourquoi `COUNT(CASE WHEN ...)` plutôt qu'un `WHERE` (garder les catégories à 0)
- [ ] Pourquoi `LEFT JOIN` et non `INNER JOIN` sur les catégories
- [ ] Pourquoi la grille des tuiles ne nécessite aucune media query
- [ ] Vérification des contrastes WCAG AA sur les couleurs de catégories

---

> *Confidentiel — Ne pas diffuser*
> *LOC MNS — Projet DEVWEB / CDA 2025-2026*