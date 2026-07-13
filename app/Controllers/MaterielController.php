<?php 
// app/Controllers/MaterielController.php

//controleur matériel

require_once __DIR__ . "/../View.php";
require_once __DIR__ . "/Controller.php";

class MaterielController extends Controller{
    public function materiel():void{
        // afficher la page materiel avec la liste lié à la bdd 
        $listMateriel = new MatrielManager();
        $materiel = $listMateriel -> getAllMateriel();
        $this -> view ->render('admin/dashboard',[
            'title' => 'List Materiel',
            'listMateriel' => $materiel,
            'materiel' => true //pour active le css du materiel
        ]);
    }
}




?>