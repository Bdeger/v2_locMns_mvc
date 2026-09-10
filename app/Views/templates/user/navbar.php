<!-- Views/templates/user/navbar.php -->

<header class="header">
    <div class="header-top">
        <a href="/user/accueil">
            <img src="/image/logo2.png" alt="LOC MNS - retour à l'accueil">
        </a>
    </div>

    <nav id="navbar" aria-label="Navigation principale">
        <button id="burger-button-display" aria-expanded="false" aria-label="Ouvrir le menu" aria-controls="nav-ul">
            <i class="ti ti-menu-2"></i>
            <i class="ti ti-x"></i>
        </button>

        <ul id="nav-ul">
            <li><a href="/user/accueil">Accueil</a></li>
            <li><a href="/user/mesEmprunts">Mes Emprunts</a></li>
            <li>
                <a href="/auth/logout">
                    <i class="ti ti-logout"></i>Déconnexion
                </a>
            </li>
        </ul>
    </nav>
</header>