<?php

//Models/AuthManager.php

require_once __DIR__ .'/Manager.php';
class MaterielManager extends Manager{
    public function getAllMateriel():array{
        $stmt = $this->pdo->prepare("
        SELECT m.nom, m.modele, m.numero_serie, m.localisation, m.description,m.date_acquisition, m.id_materiel,
            c.nom AS categorie,
            em.nom_etat AS etat
        FROM materiel m
        INNER JOIN categorie c ON m.id_categorie = c.id_categorie
        INNER JOIN etat_materiel em ON m.id_etat_materiel = em.id_etat_materiel "
        );
        $stmt -> execute();
        return $stmt -> fetchAll();
    }

    public function addMateriel($nom,$modele,$numero_serie,$localisation,$description, $id_categorie, $id_etat_materiel, $date_acquisition){
        $stmt = $this ->pdo->prepare('
        INSERT INTO materiel(nom,modele,numero_serie,localisation,description, id_categorie, id_etat_materiel, date_acquisition)
        VALUES(:nom, :modele, :numero_serie, :localisation, :description, :id_categorie, :id_etat_materiel, :date_acquisition)
        ');
        $stmt -> execute([
            ':nom' => $nom,
            ':modele'=> $modele,
            ':numero_serie' => $numero_serie,
            ':localisation' => $localisation,
            ':description' => $description,
            ':id_categorie' => $id_categorie,
            ':id_etat_materiel' => $id_etat_materiel,
            ':date_acquisition'=> $date_acquisition
        ]);
        
    }
    public function deleteMateriel($id):void{
        $stmt = $this -> pdo -> prepare('
        DELETE FROM materiel 
        WHERE id_materiel = :id');
        $stmt -> execute([
            ':id' => $id
        ]);
    }
}




?>