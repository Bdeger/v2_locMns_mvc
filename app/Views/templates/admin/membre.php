<?php include __DIR__ . '/sidebar.php'; ?>

<!-- /Views/templates/admin/membre.php -->

<main>
    <?php include __DIR__ . "/../messages.php"; ?>

    <header class="header-membre">
        <h1>Membres</h1>
        <p>Gestion des utilisateurs de la plateforme</p>
    </header>

    <div class="membre-header-actions">
        <a href="/membre/ajouterMembre" class="btn-ajouter">
            <i class="ti ti-plus"></i>
            Ajouter
        </a>
    </div>

    <div class="membre-content">

        <?php foreach($listMembre as $membre): ?>
            <article class="membre-card">

                <div class="membre-icon">
                    <?php echo strtoupper(substr($membre['prenom'], 0, 1) . substr($membre['nom'], 0, 1)); ?>
                </div>

                <div class="membre-infos">
                    <p class="nom">
                        <?php echo htmlspecialchars($membre['prenom'] . ' ' . $membre['nom']); ?>
                    </p>
                    <p class="mail">
                        <?php echo htmlspecialchars($membre['email']); ?>
                    </p>

                    <div class="membre-badges">
                        <span class="badge-role"><?php echo htmlspecialchars($membre['role']); ?></span>
                        <span class="badge-statut badge-statut-<?php echo $membre['id_statut_utilisateur']; ?>">
                            <?php echo htmlspecialchars($membre['statut']); ?>
                        </span>
                    </div>

                    <?php if(!empty($membre['commentaire'])): ?>
                        <p class="commentaire"><?php echo htmlspecialchars($membre['commentaire']); ?></p>
                    <?php endif; ?>

                    <div class="actions">
                        <a href="/membre/modifier/<?php echo $membre['id_utilisateur']; ?>">Modifier</a>
                    </div>
                </div>

            </article>
        <?php endforeach; ?>

    </div>

</main>