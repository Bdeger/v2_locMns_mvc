<?php
// app/Controllers/Controller.php

abstract class Controller{
    public function __construct(
        protected View $view = new View()
    ){
        // constructor Property Promotion
    }

        // ---------SECURITE--------------

    // vérifie que l'utilisateur est connecté
    protected function checkAuth():void{
        if(empty($_SESSION['user'])){
            $_SESSION['erreur'] = "Vous devez être connecté pour accéder à cette page. ";
            header('Location: /auth/login');
            exit;
        }
    }

    // Vérifie que l'utilisateur est administrateur
    protected function checkAdmin():void{
        $this -> checkAuth();
        if($_SESSION['user']['role'] !== 'Administrateur'){
            $_SESSION['erreur'] = "Accès réservé aux administrateurs.";
            header('Location: /user/accueil');
            exit;
        }
    }

    // ---------VALIDATION--------------

    // vérifie qu'une date existe et respecte le format AAAA-MM-JJ
    protected function dateValide(?string $date):bool{
        if(empty($date)){
            return false;
        }
        $objetDate = DateTime::createFromFormat('Y-m-d', $date);
        return $objetDate !== false && $objetDate->format('Y-m-d') === $date;
    }
}
