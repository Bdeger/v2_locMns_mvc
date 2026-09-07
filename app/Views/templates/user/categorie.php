<?php include __DIR__ . "/navbar.php"; ?>

<?php
$icones = [
    1 => 'ti-device-laptop',
    2 => 'ti-device-ipad',
    3 => 'ti-device-desktop',
    4 => 'ti-mouse'
];
$icone = $icones[$categorieInfo['id_categorie']] ?? 'ti-package';
?>

<main>
    <?php include __DIR__ . "/../messages.php"; ?>

    <!-- EN-TETE DE LA CATEGORIE -->
    <section class="header-categorie header-categorie-<?php echo $categorieInfo['id_categorie']; ?>">
        <a href="/user/accueil" class="header-categorie-retour">
            <i class="ti ti-arrow-left"></i> Retour aux catégories
        </a>
        <h1 class="header-categorie-titre"><?php echo htmlspecialchars($categorieInfo['nom']); ?></h1>
        <p class="header-categorie-description"><?php echo htmlspecialchars($categorieInfo['description'] ?? ''); ?></p>
    </section>

    <!-- CHOIX DE LA PERIODE -->
    <section class="periode">
        <p class="periode-titre">Pour quelle période ?</p>

        <form action="/user/categorie/<?php echo $categorieInfo['id_categorie']; ?>" method="get" class="periode-form">

            <div class="periode-champ">
                <label for="date_debut" class="periode-champ-label">Du</label>
                <input type="date" name="date_debut" id="date_debut" value="<?php echo $dateDebut; ?>" class="periode-champ-input">
            </div>

            <div class="periode-champ">
                <label for="date_fin" class="periode-champ-label">Au</label>
                <input type="date" name="date_fin" id="date_fin" value="<?php echo $dateFin; ?>" class="periode-champ-input">
            </div>

            <input type="submit" value="Voir les disponibilités" class="periode-bouton">
        </form>

        <p id="message-date" class="periode-erreur"></p>
    </section>

    <!-- LISTE DES MATERIELS DISPONIBLES -->
    <section class="materiel-liste">

        <?php if(empty($listMateriel)): ?>

            <p class="materiel-liste-vide">Aucun matériel disponible sur cette période.</p>

        <?php else: ?>

            <p class="materiel-liste-compte">
                <strong><?php echo count($listMateriel); ?> matériel<?php echo count($listMateriel) > 1 ? 's' : ''; ?> disponible<?php echo count($listMateriel) > 1 ? 's' : ''; ?></strong> sur cette période
            </p>

            <?php foreach($listMateriel as $materiel): ?>
                <article class="materiel-carte">

                    <div class="materiel-carte-icone">
                        <i class="ti <?php echo $icone; ?>"></i>
                    </div>

                    <div class="materiel-carte-infos">
                        <p class="materiel-carte-nom"><?php echo htmlspecialchars($materiel['nom']); ?></p>
                        <p class="materiel-carte-detail">
                            <?php echo htmlspecialchars($materiel['modele'] ?? ''); ?>
                            <?php if(!empty($materiel['description'])): ?>
                                · <?php echo htmlspecialchars($materiel['description']); ?>
                            <?php endif; ?>
                        </p>
                    </div>

                    <a href="/emprunt/demander?materiel=<?php echo $materiel['id_materiel']; ?>&debut=<?php echo $dateDebut; ?>&fin=<?php echo $dateFin; ?>" class="materiel-carte-bouton">Choisir</a>

                </article>
            <?php endforeach; ?>

        <?php endif; ?>

        <!-- DEMANDE SANS MATERIEL IMPOSE -->
        <div class="demande-libre">
            <div class="demande-libre-icone">
                <i class="ti ti-wand"></i>
            </div>
            <div class="demande-libre-infos">
                <p class="demande-libre-titre">Peu importe le modèle</p>
                <p class="demande-libre-texte">Le service technique choisira un matériel disponible</p>
            </div>
            <a href="/emprunt/demander?categorie=<?php echo $categorieInfo['id_categorie']; ?>&debut=<?php echo $dateDebut; ?>&fin=<?php echo $dateFin; ?>" class="demande-libre-bouton">Demander</a>
        </div>

    </section>

</main>