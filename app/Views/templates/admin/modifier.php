<?php include __DIR__ . '/sidebar.php';?>
<?php include __DIR__ . "/../messages.php"; ?>

<!-- /Views/templates/admin/modifier.php -->
<div class="main-content">
    <header class="header-materiel">
        <div class="title">
            <h1>Modifier un matériel</h1>
        </div>
    </header>

    <div class="back">
        <a href="/materiel" class="btn-retour">
            <i class="ti ti-arrow-left"></i>
            Retour à la liste
        </a>
    </div>

    <!-- FORMULAIRE -->
    <section class="form-addMateriel">
        <form action="/materiel/processModifier/<?php echo $materiel['id_materiel']; ?>" method="post" id="form-modifierMateriel">
            <?php if(isset($error)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif;?>
            <p class="form-note">* Champs Obligatoires</p>

            <div class="form-group">
                <label for="nom">Nom *</label>
                <input type="text"
                    name="nom"
                    id="nom"
                    value="<?php echo htmlspecialchars($materiel['nom']); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="modele">Modèle *</label>
                <input type="text"
                    name="modele"
                    id="modele"
                    value="<?php echo htmlspecialchars($materiel['modele']); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="numero_serie">Numéro de série *</label>
                <input type="text"
                    name="numero_serie"
                    id="numero_serie"
                    value="<?php echo htmlspecialchars($materiel['numero_serie']); ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="localisation">Localisation</label>
                <input type="text"
                    name="localisation"
                    id="localisation"
                    value="<?php echo htmlspecialchars($materiel['localisation'] ?? ''); ?>">
            </div>

            <div class="form-group">
                <label for="id_categorie">Catégorie *</label>
                <select name="id_categorie" id="id_categorie" required>
                    <option value="">-- Choisir une catégorie --</option>
                    <option value="1" <?php echo $materiel['id_categorie'] == 1 ? 'selected' : ''; ?>>Ordinateur portable</option>
                    <option value="2" <?php echo $materiel['id_categorie'] == 2 ? 'selected' : ''; ?>>Tablette</option>
                    <option value="3" <?php echo $materiel['id_categorie'] == 3 ? 'selected' : ''; ?>>Écran</option>
                    <option value="4" <?php echo $materiel['id_categorie'] == 4 ? 'selected' : ''; ?>>Accessoires</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id_etat_materiel">État *</label>
                <select name="id_etat_materiel" id="id_etat_materiel" required>
                    <option value="">-- Sélectionner --</option>
                    <option value="1" <?php echo $materiel['id_etat_materiel'] == 1 ? 'selected' : ''; ?>>Disponible</option>
                    <option value="2" <?php echo $materiel['id_etat_materiel'] == 2 ? 'selected' : ''; ?>>Emprunté</option>
                    <option value="3" <?php echo $materiel['id_etat_materiel'] == 3 ? 'selected' : ''; ?>>En maintenance</option>
                    <option value="4" <?php echo $materiel['id_etat_materiel'] == 4 ? 'selected' : ''; ?>>Hors service</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date_acquisition">Date d'acquisition</label>
                <input type="date"
                    name="date_acquisition"
                    id="date_acquisition"
                    value="<?php echo htmlspecialchars($materiel['date_acquisition'] ?? ''); ?>">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description"
                    placeholder="ex: Ordinateur portable pour développement"><?php echo htmlspecialchars($materiel['description'] ?? ''); ?></textarea>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-submit">
                    <i class="ti ti-edit"></i> Modifier le matériel
                </button>
                <a href="/materiel" class="btn-annuler">Annuler</a>
            </div>

        </form>
    </section>
</div>