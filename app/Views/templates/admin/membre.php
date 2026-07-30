<?php  include __DIR__ . '/sidebar.php'; ?>

<!-- /Views/templates/admin/membre.php -->

<header class="header-materiel">
    <div class="title">
        <h1>Membres</h1>
        <p>Gestion des utilisateurs de la plateforme</p>
    </div>
</header>

<div class="membre-content">
    <div class="membre-header-actions">
        <a href="/membre/ajouterMembre" class="btn-ajouter">
            <i class="ti ti-plus"></i>
            Ajouter
        </a>
    </div>
    <?php foreach($listMembre as $membre): ?>
    <div class="membre-card">
        <div class="membre-icon">
            <!-- initiales du membre -->
            <?php echo strtoupper(substr($membre['prenom'], 0, 1) . substr($membre['nom'], 0, 1)); ?>
        </div>
        <div class="membre-infos">
            <div class="nom">
                <?php echo htmlspecialchars($membre['prenom'] . ' ' . $membre['nom']); ?>
            </div>
            <div class="mail">
                <?php echo htmlspecialchars($membre['email']); ?>
            </div>
            <div class="status">
                <p><?php echo htmlspecialchars($membre['role']); ?></p>
                <p><?php echo $membre['actif'] ? 'Actif' : 'Inactif'; ?></p>
            </div>
            <div class="actions">
                <a href="/membre/modifier/<?php echo $membre['id_utilisateur']; ?>">Modifier</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

