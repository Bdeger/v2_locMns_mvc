<?php include __DIR__ . "/navbar.php";?>

<section class="intro">
    <div class="intro-titre">
        <h2>Empruntez le matériel dont vous avez besoin</h2>
    </div>
<!-- BARRE DE RECHERCHE en HEADER -->
    <form action="/user/accueil" method="get" class="intro-recherche">
        <input type="text" name="recherche" id="recherche" class="intro-recherche-champ" placeholder="Ordinateur, tablette ...">
        <input type="submit" value="Rechercher" class="intro-recherche-bouton">
    </form>
</section>

<section class="list-categorie">
    <?php  foreach($listCategorie as $categorie):?>
        <a href="/user/categorie/<?php echo $categorie['id_categorie'];?>"class="carte-categorie">
            <h3><?php echo htmlspecialchars($categorie["nom"]); ?></h3>
            <p>
                <?php echo $categorie['nb_disponibles']; ?>
                disponible<?php echo $categorie['nb_disponibles'] > 1 ? 's' : ''; ?>
            </p>
        </a>
    <?php endforeach; ?>
</section>