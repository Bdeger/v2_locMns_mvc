// ===== MENU BURGER =====

const navbar = document.getElementById("navbar");
const burgerBouton = document.getElementById("burger-button-display");
const navListe = document.getElementById("nav-ul");
const versionDesktop = window.matchMedia("(min-width: 1024px)");

if (navbar && burgerBouton && navListe) {

    // le menu est masqué au chargement uniquement sur mobile / tablette
    // (fait en JS pour que le menu reste visible si JS est désactivé)
    if (!versionDesktop.matches) {
        fermerMenu();
    }

    burgerBouton.addEventListener("click", () => {
        if (navbar.classList.contains("nav-hide")) {
            ouvrirMenu();
            // on donne le focus au premier lien pour la navigation clavier
            navListe.querySelector("li:first-child a").focus();
        } else {
            fermerMenu();
        }
    });

    // fermeture avec la touche Echap, le focus revient sur le bouton
    document.addEventListener("keydown", (evenement) => {
        if (evenement.key === "Escape"
            && !navbar.classList.contains("nav-hide")
            && !versionDesktop.matches) {
            fermerMenu();
            burgerBouton.focus();
        }
    });

    // fermeture après un clic sur un lien du menu
    navListe.addEventListener("click", (evenement) => {
        if (evenement.target.closest("a") && !versionDesktop.matches) {
            fermerMenu();
        }
    });

    // on remet l'état correct quand on passe mobile <-> desktop
    versionDesktop.addEventListener("change", (evenement) => {
        if (evenement.matches) {
            ouvrirMenu();
        } else {
            fermerMenu();
        }
    });
}

function ouvrirMenu() {
    navbar.classList.remove("nav-hide");
    burgerBouton.setAttribute("aria-expanded", "true");
    burgerBouton.setAttribute("aria-label", "Fermer le menu");
}

function fermerMenu() {
    navbar.classList.add("nav-hide");
    burgerBouton.setAttribute("aria-expanded", "false");
    burgerBouton.setAttribute("aria-label", "Ouvrir le menu");
}


//VALIDATION DES DATES page catégorie

const formPeriode = document.querySelector('.periode-form');
const debut = document.getElementById('date_debut');
const fin = document.getElementById('date_fin');
const messageDate = document.getElementById('message-date');

if (formPeriode && debut && fin && messageDate) {

    function verifierDates() {
        if (debut.value && fin.value && fin.value < debut.value) {
            messageDate.textContent = "La date de fin doit être après la date de début.";
            messageDate.style.display = "block";
            return false;
        }
        messageDate.style.display = "none";
        return true;
    }

    debut.addEventListener('change', verifierDates);
    fin.addEventListener('change', verifierDates);

    formPeriode.addEventListener('submit', function(e) {
        if (!verifierDates()) {
            e.preventDefault();
        }
    });
}