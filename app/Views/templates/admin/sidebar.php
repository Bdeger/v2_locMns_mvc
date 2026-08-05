<!-- Views/templates/admin/sidebar.php -->
<header class="header">
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
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li><a href="/emprunts">Emprunts</a></li>
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