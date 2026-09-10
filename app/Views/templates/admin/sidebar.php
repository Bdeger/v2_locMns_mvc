<!-- Views/templates/admin/sidebar.php -->

<header class="header">
    <div class="header-top">
        <a href="/admin/dashboard">
            <img src="/image/logo2.png" alt="LOC MNS - retour au tableau de bord">
        </a>
    </div>

    <div class="header-bande"></div>

    <nav id="navbar" aria-label="Navigation principale">
        <button id="burger-button-display" aria-expanded="false" aria-label="Ouvrir le menu" aria-controls="nav-ul">
            <i class="ti ti-menu-2"></i>
            <i class="ti ti-x"></i>
        </button>

        <ul id="nav-ul">
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/admin/emprunts">Emprunts</a></li>
            <li><a href="/materiel">Matériel</a></li>
            <li><a href="/membre">Membres</a></li>
            <li>
                <a href="/auth/logout">
                    <i class="ti ti-logout"></i>Déconnexion
                </a>
            </li>
        </ul>
    </nav>
</header>