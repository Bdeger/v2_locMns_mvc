<?php include __DIR__ . '/sidebar.php'; ?>

<!-- /Views/templates/admin/materiel.php -->
<header class="admin-content header-materiel">
    <div class="title">
        <h1>Liste de Matériel</h1>
        <p>Gestion de votre inventaire d'équipements</p>
    </div>
</header>

<div class="admin-content materiel-content">
    <?php foreach($listMateriel as $materiel):?>
        <div class="materiel-card">
            <div class="materiel-icon">
                <i class="ti ti-device-laptop"></i>
            </div>
            <div class="materiel-infos">
                <div class="categorie">
                    <?php echo htmlspecialchars($materiel['categorie']);?>
                </div>
                <h3 class="nom">
                    <?php echo htmlspecialchars($materiel['nom']); ?>
                </h3>
                <p class="modele-serie">
                    <?php echo htmlspecialchars($materiel['modele']);?> · <?php echo htmlspecialchars($materiel['numero_serie']);?>
                </p>
                <p class="emplacement">
                    <i class="ti ti-map-pin"></i> <?php echo htmlspecialchars($materiel['localisation']);?>
                </p>
                <p class="description">
                    <?php echo htmlspecialchars($materiel['description']);?>
                </p>
                <div class="statut" data-statut="<?php echo htmlspecialchars($materiel['etat']); ?>"></div>
            </div>
            <div class="actions">Actions</div>
        </div>
    <?php endforeach;?>
</div>