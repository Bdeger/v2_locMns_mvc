<?php 
// app/Controllers/AdminController.php 

// controleur pour Dahsboard

require_once __DIR__ . "/../Views/View.php";
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../Models/EmpruntManager.php";

class AdminController extends Controller{
    public function dashboard():void{
        // afficher la page d'accueil dashboard
        $this -> view -> render('admin/dashboard',[
            'title' => 'Dashboard Admin',
            'dashboard' => true //active le css du dashboard 
        ]);
    }
    public function emprunts():void{
        $empruntManager = new EmpruntManager();
        $demandes = $empruntManager -> getDemandes();

        $this -> view -> render('admin/emprunts',[
            'title' => 'Demande d\emprunt,',
            'demandes' => $demandes,
            'empruntPage' => true
        ]);
    }

        public function valider(): void {
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

    public function refuser(): void {
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

    public function rendu(): void {
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



