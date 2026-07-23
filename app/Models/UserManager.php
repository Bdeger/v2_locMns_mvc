<?php 
// Models/AuthManager.php

require_once __DIR__ .'/Manager.php';
class UserManager extends Manager{
    public function findByEmail(string $email): ?array{
        $stmt = $this -> pdo -> prepare("
        SELECT u.email, u.mot_de_passe, r.nom
        FROM utilisateur u
        INNER JOIN role r ON u.id_role =r.id_role 
        WHERE u.email = ?"
        );
        $stmt -> execute([$email]);
        return $stmt -> fetch(); //fetch : retourne une seule ligne
    }

    public function getAllUsers():array{
        $stmt = $this ->pdo -> prepare("
        SELECT u.nom, u.prenom, u.adresse_postale, u.telephone, u.email,u.date_inscription, u.actif, u.date_derniere_connexion, u.id_utilisateur, 
            r.nom AS role
        FROM utilisateur u
        INNER JOIN role r ON u.id_role = r.id_role");
        $stmt -> execute();
        return $stmt -> fetchAll();
}
}






?>