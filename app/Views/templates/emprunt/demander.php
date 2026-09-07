<?php include __DIR__ . "/../user/navbar.php"; ?>

<main>
    <?php include __DIR__ . "/../messages.php"; ?>

    <section class="confirmation">

        <a href="/user/accueil" class="confirmation-retour">
            <i class="ti ti-arrow-left"></i> Retour
        </a>

        <h1 class="confirmation-titre">Confirmer votre demande</h1>
        <p class="confirmation-soustitre">Vérifiez les informations avant d'envoyer</p>

        <div class="recap">

            <!-- MATERIEL OU CATEGORIE -->
            <div class="recap-ligne">
                <?php if(!empty($materiel)): ?>
                    <p class="recap-label">Matériel demandé</p>
                    <p class="recap-valeur"><?php echo htmlspecialchars($materiel['nom']); ?></p>
                    <p class="recap-detail"><?php echo htmlspecialchars($materiel['modele'] ?? ''); ?></p>
                <?php else: ?>
                    <p class="recap-label">Catégorie demandée</p>
                    <p class="recap-valeur"><?php echo htmlspecialchars($categorie['nom']); ?></p>
                    <p class="recap-detail">Le service technique choisira un matériel disponible</p>
                <?php endif; ?>
            </div>

            <!-- PERIODE -->
            <div class="recap-ligne recap-periode">
                <div class="recap-bloc">
                    <p class="recap-label">Du</p>
                    <p class="recap-valeur"><?php echo date('d/m/Y', strtotime($dateDebut)); ?></p>
                </div>
                <div class="recap-bloc">
                    <p class="recap-label">Au</p>
                    <p class="recap-valeur"><?php echo date('d/m/Y', strtotime($dateFin)); ?></p>
                </div>
                <div class="recap-bloc">
                    <p class="recap-label">Durée</p>
                    <p class="recap-valeur"><?php echo $duree; ?> jour<?php echo $duree > 1 ? 's' : ''; ?></p>
                </div>
            </div>

            <!-- DEMANDEUR -->
            <div class="recap-ligne">
                <p class="recap-label">Demandeur</p>
                <p class="recap-valeur">
                    <?php echo htmlspecialchars($_SESSION['user']['prenom']); ?>
                    <?php echo htmlspecialchars($_SESSION['user']['nom']); ?>
                </p>
                <p class="recap-detail"><?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
            </div>

        </div>

        <div class="avertissement">
            <i class="ti ti-alert-circle"></i>
            <p>Votre demande sera transmise au service technique. Vous serez informé de sa validation depuis « Mes emprunts ».</p>
        </div>

        <!-- ENVOI DE LA DEMANDE -->
        <form action="/emprunt/enregistrer" method="post" class="confirmation-form">

            <?php if(!empty($idMateriel)): ?>
                <input type="hidden" name="materiel" value="<?php echo $idMateriel; ?>">
            <?php endif; ?>

            <?php if(!empty($idCategorie)): ?>
                <input type="hidden" name="categorie" value="<?php echo $idCategorie; ?>">
            <?php endif; ?>

            <input type="hidden" name="debut" value="<?php echo $dateDebut; ?>">
            <input type="hidden" name="fin" value="<?php echo $dateFin; ?>">

            <a href="/user/accueil" class="confirmation-annuler">Annuler</a>
            <input type="submit" value="Envoyer la demande" class="confirmation-envoyer">
        </form>

    </section>

</main>