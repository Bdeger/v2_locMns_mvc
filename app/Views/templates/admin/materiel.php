<?php include __DIR__ . '/sidebar.php'; ?>

<!-- /Views/templates/admin/materiel.php -->

<?php
$icones = [
    1 => 'ti-device-laptop',
    2 => 'ti-device-ipad',
    3 => 'ti-device-desktop',
    4 => 'ti-mouse'
];
?>

<main>
    <?php include __DIR__ . "/../messages.php"; ?>

    <header class="header-materiel">
        <h1>Liste de Matériel</h1>
        <p>Gestion de votre inventaire d'équipements</p>
    </header>

    <div class="materiel-header-actions">
        <a href="/materiel/ajouter" class="btn-ajouter">
            <i class="ti ti-plus"></i> Ajouter
        </a>
    </div>

    <div class="materiel-content">

        <?php foreach($listMateriel as $materiel): ?>
            <article class="materiel-card materiel-card-<?php echo $materiel['id_etat_materiel']; ?>">

                <div class="materiel-icon">
                    <i class="ti <?php echo $icones[$materiel['id_categorie']] ?? 'ti-package'; ?>"></i>
                </div>

                <div class="materiel-infos">
                    <div class="categorie">
                        <?php echo htmlspecialchars($materiel['categorie']); ?>
                    </div>
                    <h3 class="nom">
                        <?php echo htmlspecialchars($materiel['nom']); ?>
                    </h3>
                    <p class="modele-serie">
                        <?php echo htmlspecialchars($materiel['modele'] ?? ''); ?> · <?php echo htmlspecialchars($materiel['numero_serie'] ?? ''); ?>
                    </p>
                    <p class="emplacement">
                        <i class="ti ti-map-pin"></i><?php echo htmlspecialchars($materiel['localisation'] ?? ''); ?>
                    </p>
                    <p class="description">
                        <?php echo htmlspecialchars($materiel['description'] ?? ''); ?>
                    </p>

                    <span class="materiel-etat materiel-etat-<?php echo $materiel['id_etat_materiel']; ?>">
                        <?php echo htmlspecialchars($materiel['etat']); ?>
                    </span>
                </div>

                <div class="actions">
                    <a href="/materiel/modifier/<?php echo $materiel['id_materiel']; ?>">Modifier</a>
                    <a href="/materiel/supprimer/<?php echo $materiel['id_materiel']; ?>">Supprimer</a>
                </div>

            </article>
        <?php endforeach; ?>

    </div>

</main>