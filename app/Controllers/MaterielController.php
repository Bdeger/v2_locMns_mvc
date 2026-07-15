<?php 
// app/Controllers/MaterielController.php

//controleur matériel

require_once __DIR__ . "/../Views/View.php"; 
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../Models/MaterielManager.php";

class MaterielController extends Controller{
    public function index():void{
        // afficher la page materiel avec la liste lié à la bdd 
        $listMateriel = new MaterielManager();
        $materiel = $listMateriel -> getAllMateriel();
        $this -> view ->render('admin/materiel',[
            'title' => 'List Materiel',
            'listMateriel' => $materiel,
            'materielPage' => true 
        ]);
    }
}




?>