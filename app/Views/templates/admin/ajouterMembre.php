<?php include __DIR__. '/sidebar.php';?>

<!-- /Views/templates/admin/ajouterMembre.php -->

<div class="main-content">
    <header class="header-membre">
        <h1>Ajouter un Membre</h1>
    </header>
</div>

<div class="back">
    <a href="/membre" class="btn-retour">
        <i class="ti ti-arrow-left"></i>
        Retour à la liste des membres
    </a>
</div>

<!-- FORMULAIRE  -->

<section class="form-addMembre">
    <form action="/materiel/processAjouterMembre" method="post" id="form-addMembre">
        <?php if(isset($error)): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        <p class="form-note">* Champs Obligatoires</p>
        <div class="form-group">
            <label for="nom">Nom *</label>
            <input type="text"
                name = "nom"
                id= "nom"
                placeholder="Nom"
                required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom *</label>
            <input type="text"
                name = "prenom"
                id= "prenom"
                placeholder="Prénom"
                required>
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type = "email"
                name = "email"
                id= "email"
                placeholder="Email@mns.fr"
                required>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone </label>
            <input type="number"
                name = "telephone"
                id= "telephone"
                placeholder="06 06 06 06 06">
        </div>
        <div class="form-group">
            <label for="commentaire">Commentaire</label>
            <input type="textarea"
                name = "commentaire"
                id= "commentaire"
                placeholder="Notes sur ce membre">
        </div>
        <!-- accès et role  -->
        <div class="form-group">
            <label for="id_role">Rôle</label>
            <select name="id_role" id="id_role">
                <option value="">-- Choisir le role --</option>
                <option value="1">Emprunteur</option>
                <option value="2">Administrateur</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_utilisateur">Status</label>
            <select name="status_utilisateur" id="status_utilisateur">
                <option value="1">Actif</option>
                <option value="2">Inactif</option>
                <option value="3">Suspendu</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe *</label>
            <input type="mdp"
                name = "mdp"
                id= "mdp"
                placeholder="1234">
        </div>      
        <div class="btn-group">
            <button type="submit" class="btn-submit">
                <i class="ti ti-user-plus"></i>Ajouter le membre
            </button>
            <a href="/membre" class="btn-annuler">Annuler</a>
        </div>
    </form>
</section>