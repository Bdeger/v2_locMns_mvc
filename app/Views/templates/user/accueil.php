<?php include __DIR__ . "/navbar.php";?>

<section class="intro">
    <div class="intro-titre">
        <h2>Empruntez le matériel dont vous avez besoin</h2>
    </div>

    <form class="intro-recherche">
        <input type="text" name="recherche" id="recherche" class="intro-recherche-champ" placeholder="Ordinateur, tablette ...">
        <input type="submit" value="Rechercher" class="intro-recherche-bouton">
    </form>
</section>

<section class="tri-categorie">
<pre><?php print_r($listCategorie); ?></pre>
</section>
<section class="materiel-content">
    <?php foreach($listMateriel as $materiel): ?>    
        <div class="materiel-car">
            <div class="materiel-icon">
                <i class="ti ti-device-laptop"></i>
            </div>
        </div>
        <div class="materiel-infos">
            <div class="categorie">
                <?php echo htmlspecialchars($materiel['categorie']);?>  
            </div>
            <h3 class="nom">
                <?php echo htmlspecialchars($materiel['nom']); ?>
            </h3>
            <p class="modele-serie">
                <?php echo htmlspecialchars($materiel['modele']); ?> . <?php echo htmlspecialchars($materiel['numero_serie']); ?>
            </p>
            <p class="emplacement"></p>
        </div>






    
        <?php endforeach; ?>

</section>