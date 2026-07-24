<?php 

// app/Controllers/MembresController.php

require_once __DIR__ . "/../Views/View.php";
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../Models/UserManager.php";

class MembresController extends Controller{
    public function index():void{
        // afficher page Membres 
        $listMembre = new UserManager();
        $membre = $listMembre -> getAllUsers();
        $this-> view -> render('admin/membre',[
            'title' => 'List Membre',
            'listMembre' => $membre,
            'membrePage' => true
        ]);

    }
}



?>