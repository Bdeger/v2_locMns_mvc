<?php
// app/Controllers/EmpruntController.php

require_once __DIR__ . "/../Views/View.php";
require_once __DIR__ . "/Controller.php";

require_once __DIR__ . "/../Models/EmpruntManager.php";
require_once __DIR__ . "/../Models/MaterielManager.php";
require_once __DIR__ . "/../Models/CategorieManager.php";

class EmpruntController extends Controller{

    // Affiche la page de confirmation avant l'envoi de la demande
    public function demander(): void{

        // 1. récupérer les données passées dans l'URL
        $idMateriel  = $_GET['materiel']  ?? null;
        $idCategorie = $_GET['categorie'] ?? null;
        $dateDebut   = $_GET['debut']     ?? null;
        $dateFin     = $_GET['fin']       ?? null;

        // 2. vérifier que les dates sont bien présentes
        if(empty($dateDebut) || empty($dateFin)){
            header('Location: /user/accueil');
            exit;
        }

        // 3. récupérer les infos selon le type de demande
        $materiel  = null;
        $categorie = null;

        if(!empty($idMateriel)){
            $materielManager = new MaterielManager();
            $materiel = $materielManager->getMaterielById($idMateriel);
        } else {
            $categorieManager = new CategorieManager();
            $categorie = $categorieManager->getCategorieById($idCategorie);
        }

        // 4. calculer la durée en jours
        $duree = (strtotime($dateFin) - strtotime($dateDebut)) / 86400;

        // 5. afficher la page de confirmation
        $this->view->render('emprunt/demander',[
            'title'       => 'Confirmer votre demande',
            'materiel'    => $materiel,
            'categorie'   => $categorie,
            'idMateriel'  => $idMateriel,
            'idCategorie' => $idCategorie,
            'dateDebut'   => $dateDebut,
            'dateFin'     => $dateFin,
            'duree'       => $duree,
            'demande'     => true
        ]);
    }

    // Traite le formulaire et enregistre la demande en base
    public function enregistrer(): void{

    }
}
?>