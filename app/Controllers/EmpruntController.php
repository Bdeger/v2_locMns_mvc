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
        // (int) : un identifiant ne peut être qu'un nombre -> tout le reste est neutralisé
        $idMateriel  = (int) ($_GET['materiel']  ?? 0);
        $idCategorie = (int) ($_GET['categorie'] ?? 0);
        $dateDebut   = $_GET['debut'] ?? null;
        $dateFin     = $_GET['fin']   ?? null;

        // 2. les dates doivent exister et être au format AAAA-MM-JJ
        if(!$this->dateValide($dateDebut) || !$this->dateValide($dateFin)){
            $_SESSION['erreur'] = "Veuillez indiquer une période valide.";
            header('Location: /user/accueil');
            exit;
        }

        // 3. la date de fin doit être après la date de début
        if($dateFin < $dateDebut){
            $_SESSION['erreur'] = "La date de fin doit être après la date de début.";
            header('Location: /user/accueil');
            exit;
        }

        // 4. récupérer les infos selon le type de demande
        $materiel  = null;
        $categorie = null;

        if($idMateriel > 0){
            $materielManager = new MaterielManager();
            $materiel = $materielManager->getMaterielById($idMateriel);
        } elseif($idCategorie > 0){
            $categorieManager = new CategorieManager();
            $categorie = $categorieManager->getCategorieById($idCategorie);
        }

        // le matériel ou la catégorie doit exister en base
        if(empty($materiel) && empty($categorie)){
            $_SESSION['erreur'] = "Ce matériel ou cette catégorie n'existe pas.";
            header('Location: /user/accueil');
            exit;
        }

        // 5. calculer la durée en jours (jour de début ET jour de fin inclus)
        // ex : du 05/10 au 09/10 = 5 jours
        $duree = (new DateTime($dateDebut))->diff(new DateTime($dateFin))->days + 1;

        // 6. afficher la page de confirmation
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
        $idMateriel  = (int) ($_POST['materiel']  ?? 0);
        $idCategorie = (int) ($_POST['categorie'] ?? 0);
        $dateDebut   = $_POST['debut'] ?? null;
        $dateFin     = $_POST['fin']   ?? null;

        // l'utilisateur vient de la session, jamais du formulaire
        $idUtilisateur = $_SESSION['user']['id'];

        // 2. au moins un matériel OU une catégorie doit être renseigné
        if($idMateriel === 0 && $idCategorie === 0){
            $_SESSION['erreur'] = "Aucun matériel ni catégorie sélectionné.";
            header('Location: /user/accueil');
            exit;
        }

        // 3. vérifier que les dates sont présentes et au bon format
        if(!$this->dateValide($dateDebut) || !$this->dateValide($dateFin)){
            $_SESSION['erreur'] = "Veuillez indiquer une période complète.";
            header('Location: /user/accueil');
            exit;
        }

        // 4. construire l'url de retour en cas d'erreur
        // http_build_query encode proprement chaque paramètre
        $parametres = $idMateriel > 0
            ? ['materiel' => $idMateriel]
            : ['categorie' => $idCategorie];
        $parametres['debut'] = $dateDebut;
        $parametres['fin']   = $dateFin;
        $retour = '/emprunt/demander?' . http_build_query($parametres);

        // 5. la date de fin doit être après la date de début
        if($dateFin < $dateDebut){
            $_SESSION['erreur'] = "La date de fin doit être après la date de début.";
            header('Location: ' . $retour);
            exit;
        }

        // 6. la date de début ne peut pas être dans le passé
        if($dateDebut < date('Y-m-d')){
            $_SESSION['erreur'] = "La date de début ne peut pas être dans le passé.";
            header('Location: ' . $retour);
            exit;
        }

        // 7. enregistrer la demande
        $empruntManager = new EmpruntManager();
        $empruntManager->addEmprunt(
            $idMateriel ?: null,
            $idCategorie ?: null,
            $idUtilisateur,
            $dateDebut,
            $dateFin
        );

        // 8. rediriger avec un message de succès
        $_SESSION['succes'] = "Votre demande a bien été envoyée.";
        header('Location: /user/accueil');
        exit;
    }
}
