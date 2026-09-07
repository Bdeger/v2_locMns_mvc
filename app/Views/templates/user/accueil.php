<?php include __DIR__ . "/navbar.php"; ?>

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

    <section class="intro">
        <div class="intro-titre">
            <h2>Empruntez le matériel dont vous avez besoin</h2>
        </div>

        <!-- BARRE DE RECHERCHE -->
        <form action="/user/accueil" method="get" class="intro-recherche">
            <input type="text" name="recherche" id="recherche" class="intro-recherche-champ"
                   placeholder="Ordinateur, tablette ..."
                   value="<?php echo htmlspecialchars($recherche); ?>">
            <input type="submit" value="Rechercher" class="intro-recherche-bouton">
        </form>
    </section>


    <?php if(!empty($recherche)): ?>

        <!-- RESULTATS DE RECHERCHE -->
        <section class="resultats">

            <div class="resultats-header">
                <p class="resultats-compte">
                    <strong><?php echo count($resultats); ?> résultat<?php echo count($resultats) > 1 ? 's' : ''; ?></strong>
                    pour « <?php echo htmlspecialchars($recherche); ?> »
                </p>
                <a href="/user/accueil" class="resultats-reset">Effacer</a>
            </div>

            <?php if(empty($resultats)): ?>

                <p class="resultats-vide">Aucun matériel ne correspond à votre recherche.</p>

            <?php else: ?>

                <?php foreach($resultats as $mat): ?>
                    <article class="resultat-carte">
                        <div class="resultat-icone">
                            <i class="ti <?php echo $icones[$mat['id_categorie']] ?? 'ti-package'; ?>"></i>
                        </div>
                        <div class="resultat-infos">
                            <p class="resultat-nom"><?php echo htmlspecialchars($mat['nom']); ?></p>
                            <p class="resultat-detail">
                                <?php echo htmlspecialchars($mat['modele'] ?? ''); ?> · <?php echo htmlspecialchars($mat['categorie']); ?>
                            </p>
                        </div>
                        <a href="/user/categorie/<?php echo $mat['id_categorie']; ?>" class="resultat-bouton">Voir</a>
                    </article>
                <?php endforeach; ?>

            <?php endif; ?>

        </section>

    <?php else: ?>

        <!-- LISTE DES CATEGORIES -->
        <section class="categorie-section">
            <div class="list-categorie">
                <?php foreach($listCategorie as $categorie): ?>
                    <a href="/user/categorie/<?php echo $categorie['id_categorie']; ?>" class="carte-categorie carte-categorie-<?php echo $categorie['id_categorie']; ?>">
                        <i class="ti <?php echo $icones[$categorie['id_categorie']] ?? 'ti-package'; ?>"></i>
                        <h3><?php echo htmlspecialchars($categorie['nom']); ?></h3>
                        <p><?php echo $categorie['nb_disponibles']; ?> disponible<?php echo $categorie['nb_disponibles'] > 1 ? 's' : ''; ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- MES DEMANDES EN COURS -->
        <?php if(!empty($mesDemandes)): ?>
            <section class="mes-demandes">

                <div class="mes-demandes-header">
                    <h3>Vos demandes récentes</h3>
                    <a href="/user/mesEmprunts" class="btn-voir-tout">Voir tout</a>
                </div>

                <?php foreach($mesDemandes as $demande): ?>
                    <article class="demande-ligne demande-ligne-<?php echo $demande['id_status_emprunt']; ?>">
                        <div>
                            <p class="demande-materiel">
                                <?php if(!empty($demande['nom_materiel'])): ?>
                                    <?php echo htmlspecialchars($demande['nom_materiel']); ?>
                                <?php else: ?>
                                    <?php echo htmlspecialchars($demande['nom_categorie']); ?>
                                <?php endif; ?>
                            </p>
                            <p class="demande-dates">
                                <i class="ti ti-calendar"></i>
                                <?php echo date('d/m/Y', strtotime($demande['date_debut_souhaitee'])); ?>
                                &rarr;
                                <?php echo date('d/m/Y', strtotime($demande['date_fin_souhaitee'])); ?>
                            </p>
                        </div>

                        <span class="status status-<?php echo $demande['id_status_emprunt']; ?>">
                            <?php echo htmlspecialchars($demande['nom_status']); ?>
                        </span>
                    </article>
                <?php endforeach; ?>

            </section>
        <?php endif; ?>

    <?php endif; ?>

</main>