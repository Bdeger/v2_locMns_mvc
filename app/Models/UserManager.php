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
        $stmt = $this->pdo->prepare("
        SELECT u.id_utilisateur, u.nom, u.prenom, u.telephone, u.email, u.date_inscription, u.commentaire,
            r.nom AS role,
            s.nom AS statut
        FROM utilisateur u
        INNER JOIN role r ON u.id_role = r.id_role
        INNER JOIN statut_utilisateur s ON u.id_statut_utilisateur = s.id_statut_utilisateur        
        WHERE u.id_role = 2
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function addUser($nom, $prenom, $telephone, $email, $mot_de_passe, $date_inscription, $id_role, $id_statut_utilisateur, $commentaire):void{
        $stmt = $this->pdo->prepare("
        INSERT INTO utilisateur(nom, prenom, telephone, email, mot_de_passe, date_inscription, id_role, id_statut_utilisateur, commentaire)
        VALUES(:nom, :prenom, :telephone, :email, :mot_de_passe, :date_inscription, :id_role, :id_statut_utilisateur, :commentaire)
        ");
        $stmt->execute([
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":telephone" => $telephone,
            ":email" => $email,
            ":mot_de_passe" => $mot_de_passe,
            ":date_inscription" => $date_inscription,
            ":id_role" => $id_role,
            ":id_statut_utilisateur" => $id_statut_utilisateur,
            ":commentaire" => $commentaire
        ]);
    }
}

// faire WHERE id=2 quand on aura des membres en plus



?>