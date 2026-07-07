<?php 
// app/Models/Manager.php

abstract class Manager{
    protected PDO $pdo;
    public function __construct(){
        $this -> pdo = require __DIR__ . "/../../config/database.php";
    }
}


// database.php  →  crée le PDO, configure, retourne l'objet
// Manager.php   →  récupère juste cet objet avec require



?>