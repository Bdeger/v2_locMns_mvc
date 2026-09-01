<?php 
include __DIR__ . '/sidebar.php'; ?>
<?php include __DIR__ . "/../messages.php"; ?>

<!-- Views/templates/admin/dashboard.php -->

<section class="resum container">
    <h2>Vue d'ensemble</h2>

    <div class = "card-top">
        <div class='card-total'>
            <h3>TOTAL MATERIEL</h3>
            <p><?php echo $statsMateriel['total']; ?></p>
        </div>
        <div class = 'card-available'>
            <h3>DISPONIBLE</h3>
            <p><?php echo $statsMateriel['disponibles']; ?></p>
        </div>
    </div>
    <div class = "card-bottom">
        <div class='card-ongoing'>
            <h3>À RÉCUPÉRER</h3>
            <p><?php echo $statsEmprunt['a_recuperer']; ?></p>
        </div>
        <div class="card-pending">
            <h3>EN ATTENTE</h3>
            <p><?php echo $statsEmprunt['en_attente']; ?></p>
        </div>
    </div>

</section>

<!-- derniers emprunts -->
<section class="last-emprunts">

    <div class="last-emprunts-header">
        <h3>Derniers emprunts</h3>
        <a href="/admin/emprunts" class="btn-voir-tout">Voir tout</a>
    </div>

    <?php if(empty($derniers)): ?>

        <p class="emprunteur-materiel">Aucun emprunt pour le moment.</p>

    <?php else: ?>

        <?php foreach($derniers as $emprunt): ?>
            <article class="emprunteur">
                <div>
                    <p class="emprunteur-nom">
                        <?php echo htmlspecialchars($emprunt['prenom_user']); ?>
                        <?php echo htmlspecialchars($emprunt['nom_user']); ?>
                    </p>
                    <p class="emprunteur-materiel">
                        <?php if(!empty($emprunt['nom_materiel'])): ?>
                            <?php echo htmlspecialchars($emprunt['nom_materiel']); ?>
                        <?php else: ?>
                            <?php echo htmlspecialchars($emprunt['nom_categorie']); ?>
                        <?php endif; ?>
                    </p>
                </div>

                <span class="status status-<?php echo $emprunt['id_status_emprunt']; ?>">
                    <?php echo htmlspecialchars($emprunt['nom_status']); ?>
                </span>
            </article>
        <?php endforeach; ?>

    <?php endif; ?>

</section>