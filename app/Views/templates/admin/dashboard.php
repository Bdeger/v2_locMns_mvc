<?php 
include __DIR__ . '/sidebar.php'; ?>
<?php include __DIR__ . "/../messages.php"; ?>

<!-- Views/templates/admin/dashboard.php -->

<!-- <section class="header">
    <div class="header-top">
        <img src="/public/image/logo2.png">
    </div>
    <div class="header-bottom">
        <h1>Dashboard Admin</h1>
    </div>
    <nav id="nav">
        <button id="burger-button-display">
           <i class="ti ti-menu-2"></i>
           <i class="ti ti-x"></i>
        </button>
        <ul id="nav-ul">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Emprunts</a></li>
            <li><a href="#">Matériel</a></li>
            <li><a href="#">Membres</a></li>
        </ul>
    </nav>
</section> -->
<section class="resum container">
    <h2>Vue d'ensemble</h2>

    <div class = "card-top">
        <div class='card-total'>
            <h3>TOTAL MATERIEL</h3>
            <p>24</p>
        </div>
        <div class = 'card-available'>
            <h3>DISPONIBLE</h3>
            <p>18</p>
        </div>
    </div>
    <div class = "card-bottom">
        <div class='card-ongoing'>
            <h3>EN COURS</h3>
            <p>4</p>
        </div>
        <div class="card-pending">
            <h3>EN ATTENTE</h3>
            <p>2</p>
        </div>
    </div>

</section>
<!-- derniers emprunts -->
  <section class="last-emprunts">
    <div class="last-emprunts-header">
        <h3>Derniers emprunts</h3>
        <a href="#" class="btn-voir-tout">Voir tout</a>
    </div>

    <div class="emprunteur">
        <div class="emprunteur-info">
            <p class="emprunteur-nom">Marie Dupont</p>
            <p class="emprunteur-materiel">MacBook Pro 13"</p>
        </div>
        <span class="status pending">En attente</span>
    </div>
    <div class="emprunteur">
        <div class="emprunteur-info">
            <p class="emprunteur-nom">Lucas Martin</p>
            <p class="emprunteur-materiel">iPad Pro</p>
        </div>
        <span class="status validated">Validé</span>
    </div>
    <div class="emprunteur">
        <div class="emprunteur-info">
            <p class="emprunteur-nom">Sofia Bernard</p>
            <p class="emprunteur-materiel">Dell XPS 15</p>
        </div>
        <span class="status ongoing">En cours</span>
    </div>
    <div class="emprunteur">
        <div class="emprunteur-info">
            <p class="emprunteur-nom">Thomas Petit</p>
            <p class="emprunteur-materiel">Écran 27"</p>
        </div>
        <span class="status refused">Refusé</span>
    </div>
</section>
<section class="navbar"></section>