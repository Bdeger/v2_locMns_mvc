<?php 
// app/Controllers/AuthController.php

// controller pour la page de connexion

require_once __DIR__ . '/../Views/View.php';

require_once __DIR__ .'/Controller.php';

class AuthController extends Controller{
    public function login():void{
        // afficher la page de connexion

        $this->view->render(
            'auth/login',
            ['title'=>'Connexion']
        );
    }
}