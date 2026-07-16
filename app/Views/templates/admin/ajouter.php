<?php include __DIR__ . '/sidebar.php';?>

<!-- /Views/templates/admin/ajouter.php -->
<div class="main-content">
    <header class="header-materiel">
        <div class="title">
            <h1>Ajouter un matériel</h1>
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
        <form action="/materiel/processAjouter" method="post" id="form-addMateriel">
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
                    placeholder="MacBook Pro"
                    required>
            </div>
            <div class="form-group">
                <label for="modele">Modèle *</label>
                <input type="text"
                    name="modele"
                    id="modele"
                    placeholder="13'' M2 2023"
                    required>
            </div>
            <div class="form-group">
                <label for="numero_serie">Numéro de série *</label>
                <input type="text"
                    name="numero_serie"
                    id="numero_serie"
                    placeholder="SN-MBP-001"
                    required>
            </div>

            <div class="form-group">
                <label for="localisation">Localisation</label>
                <input type="text"
                    name="localisation"
                    id="localisation"
                    placeholder="Salle 102">
            </div>

            <div class="form-group">
                <label for="id_categorie">Catégorie *</label>
                <select name="id_categorie" id="id_categorie" required>
                    <option value="">-- Choisir une catégorie --</option>
                    <option value="1">Ordinateur portable</option>
                    <option value="2">Tablette</option>
                    <option value="3">Écran</option>
                    <option value="4">Accessoires</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id_etat_materiel">État *</label>
                <select name="id_etat_materiel" id="id_etat_materiel" required>
                    <option value="">-- Sélectionner --</option>
                    <option value="1">Disponible</option>
                    <option value="2">Emprunté</option>
                    <option value="3">En maintenance</option>
                    <option value="4">Hors service</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_acquisition">Date d'acquisition</label>
                <input type="date" name="date_acquisition" id="date_acquisition">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description"
                    placeholder="ex: Ordinateur portable pour développement"></textarea>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-submit">
                    <i class="ti ti-plus"></i> Ajouter le matériel
                </button>
                <a href="/materiel" class="btn-annuler">Annuler</a>
            </div>

        </form>
    </section>
</div>