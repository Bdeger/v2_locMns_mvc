<?php include __DIR__ . '/sidebar.php'; ?>

<!-- /Views/templates/admin/ajouterMembre.php -->

<main>
    <?php include __DIR__ . "/../messages.php"; ?>

    <header class="header-membre">
        <h1>Ajouter un membre</h1>
    </header>

    <div class="back">
        <a href="/membre" class="btn-retour">
            <i class="ti ti-arrow-left"></i>
            Retour à la liste des membres
        </a>
    </div>

    <!-- FORMULAIRE -->
    <section class="form-addMembre">
        <form action="/membre/processAjouterMembre" method="post" id="form-addMembre">

            <?php if(isset($error)): ?>
                <div class="message message-erreur">
                    <i class="ti ti-alert-circle"></i>
                    <p><?php echo htmlspecialchars($error); ?></p>
                </div>
            <?php endif; ?>

            <p class="form-note">* Champs obligatoires</p>

            <div class="form-group">
                <label for="nom">Nom *</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom *</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" placeholder="email@mns.fr" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" name="telephone" id="telephone" placeholder="06 06 06 06 06">
            </div>

            <div class="form-group">
                <label for="mdp">Mot de passe *</label>
                <input type="password" name="mdp" id="mdp" placeholder="••••••••" required>
            </div>

            <div class="form-group">
                <label for="id_statut_utilisateur">Statut</label>
                <select name="id_statut_utilisateur" id="id_statut_utilisateur">
                    <option value="1">Actif</option>
                    <option value="2">Inactif</option>
                    <option value="3">Suspendu</option>
                </select>
            </div>

            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" id="commentaire" placeholder="Notes sur ce membre"></textarea>
            </div>

            <!-- rôle fixé à emprunteur -->
            <input type="hidden" name="id_role" value="2">

            <div class="btn-group">
                <button type="submit" class="btn-submit">
                    <i class="ti ti-user-plus"></i>Ajouter le membre
                </button>
                <a href="/membre" class="btn-annuler">Annuler</a>
            </div>

        </form>
    </section>

</main>