<!-- Views/templates/user/navbar.php -->

<header class="header">
    <div class="logo">
        <a href="/user/accueil">
            <img src="/image/logo2.png">
        </a>
    </div>
    <nav id="nav">
        <button id="burger-button-display">
           <i class="ti ti-menu-2"></i>
           <i class="ti ti-x"></i>
        </button>
        <ul id="nav-ul">
            <li><a href="/user/accueil">Accueil</a></li>
            <li>
                <a href="/user/mesEmprunts">Mes Emprunts</a>
            </li>            
            <li><a href="#">Profil</a></li>
            <li>
                <a href="/auth/logout">
                    <i class="ti ti-logout"></i>Déconnexion
                </a>
            </li>
        </ul>
    </nav>
</header>