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

    <!-- FILTRES -->
    <div class="materiel-filtres">

        <div class="filtre-groupe">
            <p class="filtre-label">État</p>
            <nav class="filtre-liste">
                <a href="/materiel<?php echo !empty($filtreCat) ? '?categorie=' . $filtreCat : ''; ?>"
                class="filtre filtre-toutes <?php echo empty($filtreEtat) ? 'filtre-actif' : ''; ?>">
                    Tous · <?php echo $total; ?>
                </a>
                <a href="/materiel?etat=1<?php echo !empty($filtreCat) ? '&categorie=' . $filtreCat : ''; ?>"
                class="filtre filtre-dispo <?php echo $filtreEtat == 1 ? 'filtre-actif' : ''; ?>">
                    Disponible · <?php echo $compteursEtat[1]; ?>
                </a>
                <a href="/materiel?etat=2<?php echo !empty($filtreCat) ? '&categorie=' . $filtreCat : ''; ?>"
                class="filtre filtre-emprunte <?php echo $filtreEtat == 2 ? 'filtre-actif' : ''; ?>">
                    Emprunté · <?php echo $compteursEtat[2]; ?>
                </a>
                <a href="/materiel?etat=3<?php echo !empty($filtreCat) ? '&categorie=' . $filtreCat : ''; ?>"
                class="filtre filtre-maintenance <?php echo $filtreEtat == 3 ? 'filtre-actif' : ''; ?>">
                    Maintenance · <?php echo $compteursEtat[3]; ?>
                </a>
                <a href="/materiel?etat=4<?php echo !empty($filtreCat) ? '&categorie=' . $filtreCat : ''; ?>"
                class="filtre filtre-horsservice <?php echo $filtreEtat == 4 ? 'filtre-actif' : ''; ?>">
                    Hors service · <?php echo $compteursEtat[4]; ?>
                </a>
            </nav>
        </div>

        <div class="filtre-groupe">
            <p class="filtre-label">Catégorie</p>
            <nav class="filtre-liste">
                <a href="/materiel<?php echo !empty($filtreEtat) ? '?etat=' . $filtreEtat : ''; ?>"
                class="filtre filtre-toutes <?php echo empty($filtreCat) ? 'filtre-actif' : ''; ?>">
                    Toutes
                </a>
                <a href="/materiel?categorie=1<?php echo !empty($filtreEtat) ? '&etat=' . $filtreEtat : ''; ?>"
                class="filtre <?php echo $filtreCat == 1 ? 'filtre-actif filtre-toutes' : ''; ?>">
                    Ordinateur · <?php echo $compteursCat[1]; ?>
                </a>
                <a href="/materiel?categorie=2<?php echo !empty($filtreEtat) ? '&etat=' . $filtreEtat : ''; ?>"
                class="filtre <?php echo $filtreCat == 2 ? 'filtre-actif filtre-toutes' : ''; ?>">
                    Tablette · <?php echo $compteursCat[2]; ?>
                </a>
                <a href="/materiel?categorie=3<?php echo !empty($filtreEtat) ? '&etat=' . $filtreEtat : ''; ?>"
                class="filtre <?php echo $filtreCat == 3 ? 'filtre-actif filtre-toutes' : ''; ?>">
                    Écran · <?php echo $compteursCat[3]; ?>
                </a>
                <a href="/materiel?categorie=4<?php echo !empty($filtreEtat) ? '&etat=' . $filtreEtat : ''; ?>"
                class="filtre <?php echo $filtreCat == 4 ? 'filtre-actif filtre-toutes' : ''; ?>">
                    Accessoires · <?php echo $compteursCat[4]; ?>
                </a>
            </nav>
        </div>

    </div>

    <div class="materiel-header-actions">
        <a href="/materiel/ajouter" class="btn-ajouter">
            <i class="ti ti-plus"></i> Ajouter
        </a>
    </div>

    <div class="materiel-content">
        <?php if(empty($listMateriel)): ?>
            <p class="materiel-vide">Aucun matériel ne correspond à ces critères.</p>
        <?php endif; ?>

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