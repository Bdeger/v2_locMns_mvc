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
}



