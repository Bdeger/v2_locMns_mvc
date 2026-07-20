<?php include __DIR__ . '/sidebar.php'; ?>

<!-- /Views/templates/admin/materiel.php -->
<header class="header-materiel">
    <div class="title">
        <h1>Liste de Matériel</h1>
        <p>Gestion de votre inventaire d'équipements</p>
    </div>
</header>

<div class="materiel-content">
    <div class="materiel-header-actions">
        <a href="/materiel/ajouter" class="btn-ajouter">
            <i class="ti ti-plus"></i> Ajouter
        </a>
    </div>
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
                <p class="date_acquisition">
                    <?php echo htmlspecialchars($materiel['date_acquisition'] ?? '' );?>
                </p>
                <div class="statut" data-statut="<?php echo htmlspecialchars($materiel['etat']); ?>"></div>
            </div>
            <div class="actions">
                <a href="/materiel/modifier/<?php echo $materiel['id_materiel']; ?>">Modifier</a>
                <a href="/materiel/supprimer/<?php echo $materiel['id_materiel']; ?>">Supprimer</a>
            </div>
        </div>
    <?php endforeach;?>
</div>