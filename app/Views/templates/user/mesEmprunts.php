<?php include __DIR__ . "/navbar.php"; ?>

<main>
    <?php include __DIR__ . "/../messages.php"; ?>

    <header class="header-mesemprunts">
        <h1>Mes emprunts</h1>
        <p>Suivez l'état de vos demandes</p>
    </header>

    <!-- FILTRES PAR STATUT -->
    <nav class="emprunt-filtres">
        <a href="/user/mesEmprunts" class="filtre filtre-toutes <?php echo empty($filtre) ? 'filtre-actif' : ''; ?>">
            Tous · <?php echo $total; ?>
        </a>
        <a href="/user/mesEmprunts?statut=1" class="filtre filtre-1 <?php echo $filtre == 1 ? 'filtre-actif' : ''; ?>">
            En attente · <?php echo $compteurs[1]; ?>
        </a>
        <a href="/user/mesEmprunts?statut=2" class="filtre filtre-2 <?php echo $filtre == 2 ? 'filtre-actif' : ''; ?>">
            Validé · <?php echo $compteurs[2]; ?>
        </a>
        <a href="/user/mesEmprunts?statut=3" class="filtre filtre-3 <?php echo $filtre == 3 ? 'filtre-actif' : ''; ?>">
            Refusé · <?php echo $compteurs[3]; ?>
        </a>
        <a href="/user/mesEmprunts?statut=5" class="filtre filtre-5 <?php echo $filtre == 5 ? 'filtre-actif' : ''; ?>">
            Terminé · <?php echo $compteurs[5]; ?>
        </a>
    </nav>

    <section class="mesemprunts-liste">

        <?php if(empty($emprunts)): ?>

            <p class="mesemprunts-vide">
                <?php if(empty($filtre)): ?>
                    Vous n'avez encore fait aucune demande.
                <?php else: ?>
                    Aucune demande dans cette catégorie.
                <?php endif; ?>
            </p>

        <?php else: ?>

            <?php foreach($emprunts as $emprunt): ?>

                <article class="mesemprunts-carte mesemprunts-carte-<?php echo $emprunt['id_status_emprunt']; ?>">

                    <div class="mesemprunts-carte-haut">
                        <p class="mesemprunts-carte-titre">
                            <?php if(!empty($emprunt['nom_materiel'])): ?>
                                <?php echo htmlspecialchars($emprunt['nom_materiel']); ?>
                            <?php else: ?>
                                <?php echo htmlspecialchars($emprunt['nom_categorie']); ?>
                                <span class="mesemprunts-attente-assign">en attente d'attribution</span>
                            <?php endif; ?>
                        </p>

                        <span class="mesemprunts-badge mesemprunts-badge-<?php echo $emprunt['id_status_emprunt']; ?>">
                            <?php echo htmlspecialchars($emprunt['nom_status']); ?>
                        </span>
                    </div>

                    <p class="mesemprunts-carte-dates">
                        <i class="ti ti-calendar"></i>
                        <?php echo date('d/m/Y', strtotime($emprunt['date_debut_souhaitee'])); ?>
                        &rarr;
                        <?php echo date('d/m/Y', strtotime($emprunt['date_fin_souhaitee'])); ?>
                    </p>

                    <p class="mesemprunts-carte-demande">
                        Demandé le <?php echo date('d/m/Y', strtotime($emprunt['date_demande'])); ?>
                    </p>

                    <?php if($emprunt['id_status_emprunt'] == 2 && !empty($emprunt['localisation'])): ?>
                        <p class="mesemprunts-info mesemprunts-info-ok">
                            <i class="ti ti-map-pin"></i>
                            À récupérer en <?php echo htmlspecialchars($emprunt['localisation']); ?>
                        </p>
                    <?php endif; ?>

                    <?php if($emprunt['id_status_emprunt'] == 3 && !empty($emprunt['motif_refus'])): ?>
                        <p class="mesemprunts-info mesemprunts-info-refus">
                            <i class="ti ti-alert-circle"></i>
                            Motif : <?php echo htmlspecialchars($emprunt['motif_refus']); ?>
                        </p>
                    <?php endif; ?>

                    <?php if($emprunt['id_status_emprunt'] == 5 && !empty($emprunt['date_retour_reel'])): ?>
                        <p class="mesemprunts-info">
                            <i class="ti ti-check"></i>
                            Rendu le <?php echo date('d/m/Y', strtotime($emprunt['date_retour_reel'])); ?>
                        </p>
                    <?php endif; ?>

                </article>

            <?php endforeach; ?>

        <?php endif; ?>

    </section>

</main>