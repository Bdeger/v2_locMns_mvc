# 📋 TODO — LOC MNS
> Projet Fil Rouge DWWM — Metz Numeric School 2025-2026

---

## ✅ Déjà réalisé

- [x] Architecture MVC PHP (Controllers, Models, Views, Router)
- [x] Système de routing dynamique dans `index.php`
- [x] Connexion à la BDD via PDO (`Manager.php`)
- [x] Page d'accueil (home) + Page de connexion (`auth/login`)
- [x] Authentification admin avec hashage mot de passe (`password_hash`)
- [x] Dashboard admin avec stats et derniers emprunts
- [x] Sidebar admin responsive (mobile burger + desktop fixe)
- [x] CRUD Matériel complet (liste, ajouter, modifier, supprimer)
- [x] Badges de statut colorés (Disponible, Emprunté, En maintenance, Hors service)
- [x] Page Membres — liste avec avatars initiales
- [x] Ajout d'un membre (formulaire + insertion BDD)
- [x] Table `statut_utilisateur` avec 3 états (Actif, Inactif, Suspendu)
- [x] Champ `commentaire` dans la table utilisateur
- [x] Layout responsive mobile first (CSS)
- [x] Gestion des branches Git (`main` + `materiel-v2`)

---

## 🔥 Prioritaire — À faire avant fin juillet

### Sidebar
- [ ] Lien sur le logo LocMns → page d'accueil

### Authentification
- [ ] Déconnexion — méthode `logout()` dans `AuthController` + lien sidebar

### Emprunts (côté admin)
- [ ] Liste des demandes (En attente, En cours, Terminé, Refusé)
- [ ] Actions : Valider / Refuser / Marquer comme rendu
- [ ] `UPDATE` statut emprunt + `UPDATE` état matériel en simultané

### Partie emprunteur
- [ ] Dashboard emprunteur (mes emprunts en cours)
- [ ] Demande d'emprunt par **catégorie** (pas par numéro de série)
- [ ] Affichage des demandes en cours et leur statut

### Sécurité sessions
- [ ] `checkAuth()` sur toutes les pages protégées
- [ ] Vérification rôle Admin vs Emprunteur à la connexion
- [ ] Redirection automatique selon le rôle

---

## 💡 Améliorations (si le temps le permet)

### Page Membres
- [ ] Champs confirmation email + confirmation mot de passe
- [ ] Mode desktop : cartes de même taille
- [ ] JS pour afficher/masquer le commentaire (voir plus)
- [ ] Champ téléphone avec sélecteur de code pays (API externe)
- [ ] Page détail membre avec adresse postale + historique emprunts
- [ ] Vérifier conformité RGPD pour l'adresse postale

### Sécurité formulaires
- [ ] Protection CSRF sur tous les formulaires
- [ ] Désactiver affichage des erreurs PHP en production
- [ ] Supprimer `hash.php` et `test_db.php` avant mise en ligne

### UX
- [ ] Modal de confirmation avant suppression matériel
  - Afficher le nom + modèle du matériel à supprimer
  - Message de succès après suppression

---

## ⭐ Bonus (fonctionnalités avancées)

### Calendrier FullCalendar
- [ ] Intégration bibliothèque JS open source
- [ ] Données emprunts passées en JSON depuis PHP
- [ ] Vue mensuelle : qui a emprunté quoi et quand
- [ ] Calendrier de disponibilités type Airbnb côté emprunteur

### Autres
- [ ] Export CSV/XML des comptes utilisateurs
- [ ] Système d'alerte (retard retour matériel, nouvelle demande)
- [ ] Gestion documentaire (notice, doc technique sur un matériel)

---

## 📚 Préparation soutenance (Août)

- [ ] Révision des process techniques avec schémas (flux MVC, sessions, PDO)
- [ ] Dossier projet (30-50 pages selon REAC DWWM)
- [ ] PowerPoint de présentation (35 min)
- [ ] Jeu d'essai de la fonctionnalité principale (emprunt)
- [ ] Veille sécurité (XSS, CSRF, injections SQL)
- [ ] Vidéo démo courte (intro projecteur 10s + démo fonctionnalités)
- [ ] Répétition de la présentation orale

---

> *Confidentiel — Ne pas diffuser*  
> *LOC MNS — Projet DEVWEB / CDA 2025-2026*
