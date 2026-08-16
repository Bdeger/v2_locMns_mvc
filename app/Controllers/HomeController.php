<?php 
// app/Controllers/HomeController.php

// controller spécifique pour la page de "Bienvenue"

require_once __DIR__ . '/../Views/View.php';
// View avant pour qu'il soit chargé avant Controller

require_once __DIR__ .'/Controller.php';

class HomeController extends Controller{
    public function index():void{
        // afficher la page d'accueil bienvenue
        $this ->view->render(
            'home/index',
            ['title' => 'Bienvenue']
        );
    }
}



