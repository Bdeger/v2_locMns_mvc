<?php
// app/Controllers/AdminController.php

require_once __DIR__ . "/../Views/View.php";
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../Models/EmpruntManager.php";
require_once __DIR__ . "/../Models/MaterielManager.php";

class AdminController extends Controller{

    public function dashboard(): void{
        $this-> checkAdmin(); //sécurité

        $materielManager = new MaterielManager();
        $statsMateriel = $materielManager -> getStatsMateriel();

        $empruntManager = new EmpruntManager();

        $this->view->render('admin/dashboard',[
            'title' => 'Dashboard Admin',
            'dashboard' => true
        ]);
    }

    public function emprunts(): void{
        $this-> checkAdmin(); //sécurité

        $empruntManager = new EmpruntManager();
        $demandes = $empruntManager->getDemandes();

        $materielManager = new MaterielManager();

        // pour chaque demande sans matériel assigné, on prépare la liste des disponibles
        foreach($demandes as $index => $demande){
            if(empty($demande['id_materiel']) && !empty($demande['id_categorie'])){
                $demandes[$index]['materiels_dispo'] = $materielManager->getMaterielDisponibleParCategorie(
                    $demande['id_categorie'],
                    $demande['date_debut_souhaitee'],
                    $demande['date_fin_souhaitee']
                );
            }
        }

        // caclul du nombre de demandes par statut
        $compteurs = [1 => 0 , 2=>0 , 3 =>0 , 4=>0, 5=>0];
        foreach ($demandes as $d) {
            $compteurs[$d['id_status_emprunt']]++;
        }

        $this->view->render("admin/emprunts",[
            'title' => "Demandes d'emprunt",
            'demandes' => $demandes,
            'compteurs' => $compteurs,
            'empruntPage' => true
        ]);
    }

    public function valider(): void{
        $this -> checkAdmin(); //sécurité

        $idEmprunt  = $_POST['id_emprunt']  ?? null;
        $idMateriel = $_POST['id_materiel'] ?? null;

        if(empty($idEmprunt) || empty($idMateriel)){
            $_SESSION['erreur'] = "Informations manquantes.";
            header('Location: /admin/emprunts');
            exit;
        }

        try {
            $empruntManager = new EmpruntManager();
            $empruntManager->validerEmprunt($idEmprunt, $idMateriel);
            $_SESSION['succes'] = "La demande a été validée.";
        } catch (Exception $e) {
            $_SESSION['erreur'] = "La validation a échoué.";
        }

        header('Location: /admin/emprunts');
        exit;
    }

    public function refuser(): void{
        $this-> checkAdmin(); //sécurité

        $idEmprunt = $_POST['id_emprunt'] ?? null;
        $motif     = $_POST['motif']      ?? null;

        if(empty($idEmprunt) || empty($motif)){
            $_SESSION['erreur'] = "Le motif de refus est obligatoire.";
            header('Location: /admin/emprunts');
            exit;
        }

        $empruntManager = new EmpruntManager();
        $empruntManager->refuserEmprunt($idEmprunt, $motif);

        $_SESSION['succes'] = "La demande a été refusée.";
        header('Location: /admin/emprunts');
        exit;
    }

    public function rendu(): void{
        $this->checkAdmin(); //sécurité

        $idEmprunt  = $_POST['id_emprunt']  ?? null;
        $idMateriel = $_POST['id_materiel'] ?? null;

        if(empty($idEmprunt) || empty($idMateriel)){
            $_SESSION['erreur'] = "Informations manquantes.";
            header('Location: /admin/emprunts');
            exit;
        }

        try {
            $empruntManager = new EmpruntManager();
            $empruntManager->marquerRendu($idEmprunt, $idMateriel);
            $_SESSION['succes'] = "Le matériel a été marqué comme rendu.";
        } catch (Exception $e) {
            $_SESSION['erreur'] = "L'opération a échoué.";
        }

        header('Location: /admin/emprunts');
        exit;
    }
}