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
        $this-> checkAuth(); //sécurité

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
        $this-> checkAuth(); //sécurité

        // 1. récupérer les données du POST
        $idMateriel  = $_POST['materiel']  ?? null;
        $idCategorie = $_POST['categorie'] ?? null;
        $dateDebut   = $_POST['debut']     ?? null;
        $dateFin     = $_POST['fin']       ?? null;

        // l'utilisateur vient de la session, jamais du formulaire
        $idUtilisateur = $_SESSION['user']['id'];

        // 2. vérifier que l'utilisateur est connecté
        
        // 3. au moins un matériel OU une catégorie doit être renseigné
        if(empty($idMateriel) && empty($idCategorie)){
            $_SESSION['erreur'] = "Aucun matériel ni catégorie sélectionné.";
            header('Location: /user/accueil');
            exit;
        }

        // 4. construire l'url de retour en cas d'erreur
        $retour = '/emprunt/demander?';

        if(!empty($idMateriel)){
            $retour .= 'materiel=' . $idMateriel;
        } else {
            $retour .= 'categorie=' . $idCategorie;
        }

        $retour .= '&debut=' . $dateDebut . '&fin=' . $dateFin;

        // 5. vérifier que les dates sont présentes
        if(empty($dateDebut) || empty($dateFin)){
            $_SESSION['erreur'] = "Veuillez indiquer une période complète.";
            header('Location: /user/accueil');
            exit;
        }

        // 6. la date de fin doit être après la date de début
        if(strtotime($dateFin) < strtotime($dateDebut)){
            $_SESSION['erreur'] = "La date de fin doit être après la date de début.";
            header('Location: ' . $retour);
            exit;
        }

        // 7. la date de début ne peut pas être dans le passé
        if(strtotime($dateDebut) < strtotime(date('Y-m-d'))){
            $_SESSION['erreur'] = "La date de début ne peut pas être dans le passé.";
            header('Location: ' . $retour);
            exit;
        }

        // 8. enregistrer la demande
        $empruntManager = new EmpruntManager();
        $empruntManager->addEmprunt(
            $idMateriel ?: null,
            $idCategorie ?: null,
            $idUtilisateur,
            $dateDebut,
            $dateFin
        );

        // 9. rediriger avec un message de succès
        $_SESSION['succes'] = "Votre demande a bien été envoyée.";
        header('Location: /user/accueil');
        exit;
    }
}