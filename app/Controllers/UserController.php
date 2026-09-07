<?php
// app/Controllers/UserController.php

// Espace emprunteur

require_once __DIR__ . "/../Views/View.php";
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../Models/MaterielManager.php";
require_once __DIR__ . "/../Models/CategorieManager.php";
require_once __DIR__ . "/../Models/EmpruntManager.php";

class UserController extends Controller{

    public function accueil(): void{
        $this->checkAuth(); //sécurité

        $recherche = trim($_GET['recherche'] ?? '');

        $listMateriel = new MaterielManager();

        // si une recherche est saisie, on filtre
        $resultats = [];
        if(!empty($recherche)){
            $resultats = $listMateriel->rechercherMateriel($recherche);
        }

        $listCategorie = new CategorieManager();
        $categorie = $listCategorie->getCategoriesAvecCompte();

        // les 3 dernières demandes de l'utilisateur
        $empruntManager = new EmpruntManager();
        $mesDemandes = array_slice(
            $empruntManager->getEmpruntsByUser($_SESSION['user']['id']), 0, 3
        );

        $this->view->render('user/accueil',[
            'title' => "Votre Espace",
            'listCategorie' => $categorie,
            'mesDemandes' => $mesDemandes,
            'recherche' => $recherche,
            'resultats' => $resultats,
            "accueil" => true
        ]);
    }

    public function categorie($id): void{
        $this->checkAuth(); //sécurité

        $dateDebut = $_GET['date_debut'] ?? date('Y-m-d');
        $dateFin = $_GET['date_fin'] ?? date('Y-m-d', strtotime('+7 days'));

        // sécurité : si les dates sont incohérentes, on revient aux valeurs par défaut
        if(strtotime($dateFin) < strtotime($dateDebut)){
            $_SESSION['erreur'] = "La date de fin doit être après la date de début.";
            $dateDebut = date('Y-m-d');
            $dateFin = date('Y-m-d', strtotime('+7 days'));
        }

        // sécurité : la date de début ne peut pas être dans le passé
        if(strtotime($dateDebut) < strtotime(date('Y-m-d'))){
            $_SESSION['erreur'] = "La date de début ne peut pas être dans le passé.";
            $dateDebut = date('Y-m-d');
            $dateFin = date('Y-m-d', strtotime('+7 days'));
        }

        $materielManager = new MaterielManager();
        $materielDispo = $materielManager->getMaterielDisponibleParCategorie($id, $dateDebut, $dateFin);

        $categorieManager = new CategorieManager();
        $categorieInfo = $categorieManager->getCategorieById($id);

        // sécurité : la catégorie doit exister
        if(empty($categorieInfo)){
            $_SESSION['erreur'] = "Cette catégorie n'existe pas.";
            header('Location: /user/accueil');
            exit;
        }

        $this->view->render('user/categorie',[
            'title' => 'Matériel disponible',
            'listMateriel' => $materielDispo,
            'dateDebut' => $dateDebut,
            'dateFin' => $dateFin,
            'categorieInfo' => $categorieInfo,
            'categorie' => true
        ]);
    }

    public function mesEmprunts(): void{
        $this->checkAuth(); //sécurité

        $idUtilisateur = $_SESSION['user']['id'];

        $empruntManager = new EmpruntManager();
        $emprunts = $empruntManager->getEmpruntsByUser($idUtilisateur);

        $this->view->render('user/mesEmprunts',[
            'title' => 'Mes emprunts',
            'emprunts' => $emprunts,
            'mesEmprunts' => true
        ]);
    }
}