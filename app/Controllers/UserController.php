<?php
// app/Controllers/UserController.php 

// Dashboard emprunteur 

require_once __DIR__ . "/../Views/View.php";
require_once __DIR__ . "/Controller.php";

class UserController extends Controller{
    public function dashboard():void{
        $this -> view -> render('user/dashboard',[
            'title' => "Votre Espace",
            "dashboard" => true 
        ]);
    }
}





?>