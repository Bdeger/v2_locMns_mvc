<?php include __DIR__ . "/sidebar.php"; ?>
<?php include __DIR__ . "/../messages.php"; ?>

<!-- tableau statut emprunts :
clé     statut
1       En attente
2       Validé
3       Refusé
4       En cours
5       Terminé
-->

<header class="header-emprunts">
    <div class="title">
        <h1 class="emprunt-header-titre">Demandes d'emprunt</h1>
        <p class="emprunt-header-compte"><?php echo $compteurs[1]; ?> en attente de traitement</p>
    </div>
</header>

<section class="emprunt-liste">

    <?php foreach($demandes as $demande): ?>

        <article class="emprunt-carte emprunt-carte-<?php echo $demande['id_status_emprunt']; ?>">

            <!-- ===== INFOS ===== -->
            <div class="emprunt-carte-infos">

                <p class="emprunt-carte-titre">
                    <?php if(!empty($demande['nom_materiel'])): ?>
                        <?php echo htmlspecialchars($demande['nom_materiel']); ?>
                    <?php else: ?>
                        <?php echo htmlspecialchars($demande['nom_categorie']); ?>
                        <span class="emprunt-carte-assigner">à assigner</span>
                    <?php endif; ?>
                </p>

                <p class="emprunt-carte-user">
                    <i class="ti ti-user"></i>
                    <?php echo htmlspecialchars($demande['prenom_user']); ?>
                    <?php echo htmlspecialchars($demande['nom_user']); ?>
                </p>

                <p class="emprunt-carte-dates">
                    <i class="ti ti-calendar"></i>
                    <?php echo date('d/m/Y', strtotime($demande['date_debut_souhaitee'])); ?>
                    &rarr;
                    <?php echo date('d/m/Y', strtotime($demande['date_fin_souhaitee'])); ?>
                </p>

            </div>

            <!-- ===== BADGE ===== -->
            <span class="emprunt-badge emprunt-badge-<?php echo $demande['id_status_emprunt']; ?>">
                <?php echo htmlspecialchars($demande['nom_status']); ?>
            </span>

            <!-- ===== ACTIONS ===== -->
            <div class="emprunt-actions">

                <?php if($demande['id_status_emprunt'] == 1): ?>

                    <form action="/admin/valider" method="post" class="emprunt-form">

                        <input type="hidden" name="id_emprunt" value="<?php echo $demande['id_emprunt']; ?>">

                        <?php if(!empty($demande['materiels_dispo'])): ?>

                            <label class="emprunt-label">Assigner un matériel</label>
                            <select name="id_materiel" class="emprunt-select" required>
                                <?php foreach($demande['materiels_dispo'] as $mat): ?>
                                    <option value="<?php echo $mat['id_materiel']; ?>">
                                        <?php echo htmlspecialchars($mat['nom']); ?>
                                        <?php if(!empty($mat['modele'])): ?>
                                            — <?php echo htmlspecialchars($mat['modele']); ?>
                                        <?php endif; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        <?php else: ?>

                            <input type="hidden" name="id_materiel" value="<?php echo $demande['id_materiel']; ?>">

                        <?php endif; ?>

                        <input type="submit" value="Valider" class="emprunt-btn-valider">
                    </form>

                    <form action="/admin/refuser" method="post" class="emprunt-form">
                        <input type="hidden" name="id_emprunt" value="<?php echo $demande['id_emprunt']; ?>">
                        <input type="text" name="motif" placeholder="Motif du refus" class="emprunt-motif" required>
                        <input type="submit" value="Refuser" class="emprunt-btn-refuser">
                    </form>

                <?php endif; ?>


                <?php if($demande['id_status_emprunt'] == 2): ?>

                    <form action="/admin/rendu" method="post" class="emprunt-form">
                        <input type="hidden" name="id_emprunt" value="<?php echo $demande['id_emprunt']; ?>">
                        <input type="hidden" name="id_materiel" value="<?php echo $demande['id_materiel']; ?>">
                        <input type="submit" value="Marquer comme rendu" class="emprunt-btn-rendu">
                    </form>

                <?php endif; ?>

            </div>

        </article>

    <?php endforeach; ?>

</section>