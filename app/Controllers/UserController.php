<?php
// app/Controllers/UserController.php 

// Dashboard """emprunteur""" 

require_once __DIR__ . "/../Views/View.php";
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../Models/MaterielManager.php";

class UserController extends Controller{
    public function accueil():void{
        $listMateriel = new MaterielManager();
        $materiel = $listMateriel -> getAllMateriel();
        $this -> view -> render('user/accueil',[
            'title' => "Votre Espace",
            'listMateriel' =>$materiel,
            "accueil" => true 
        ]);
    }
    
}





?>