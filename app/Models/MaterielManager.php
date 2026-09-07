<?php

//Models/MaterielManager.php

require_once __DIR__ .'/Manager.php';
class MaterielManager extends Manager{
    public function getAllMateriel():array{
        $stmt = $this->pdo->prepare("
        SELECT m.nom, m.modele, m.numero_serie, m.localisation, m.description,
       m.date_acquisition, m.id_materiel,
       m.id_categorie,
       m.id_etat_materiel,
       c.nom AS categorie,
       em.nom_etat AS etat
        FROM materiel m
        INNER JOIN categorie c ON m.id_categorie = c.id_categorie
        INNER JOIN etat_materiel em ON m.id_etat_materiel = em.id_etat_materiel
        ");
        $stmt -> execute();
        return $stmt -> fetchAll();
    }

    public function getMaterielById($id):array{
        $stmt = $this -> pdo -> prepare('
        SELECT * FROM materiel WHERE id_materiel = :id');
        $stmt -> execute([':id' => $id]);
        return $stmt -> fetch();
    }

    // toutes les matériels de la catégorie moins ceux déjà réservés sur la période 
    public function getMaterielDisponibleParCategorie(int $idCategorie, string $dateDebut, string $dateFin): array {
        $stmt = $this->pdo->prepare("
        SELECT m.id_materiel, m.nom, m.modele, m.description
        FROM materiel m
        WHERE m.id_categorie = ?
        AND m.id_etat_materiel = 1
        AND m.id_materiel NOT IN (
            SELECT e.id_materiel FROM emprunt e
            WHERE e.id_materiel IS NOT NULL
            AND e.id_status_emprunt IN (2, 4)
            AND e.date_debut_souhaitee <= ?
            AND e.date_fin_souhaitee >= ?
        )
        ");
        $stmt->execute([$idCategorie, $dateFin, $dateDebut]);
        return $stmt->fetchAll();
    }

    // stats : total des matériels et le nombre dispo
    public function getStatsMateriel():array{
        $stmt = $this -> pdo -> prepare("
        SELECT 
            COUNT(*) AS total,
            COUNT(CASE WHEN id_etat_materiel = 1 THEN 1 END) AS disponibles
        FROM materiel");
        $stmt -> execute();
        return $stmt -> fetch();
    }

    // Create_RUD
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

    // cruDELETE
    public function deleteMateriel($id):void{
        $stmt = $this -> pdo -> prepare('
        DELETE FROM materiel 
        WHERE id_materiel = :id');
        $stmt -> execute([
            ':id' => $id
        ]);
    }

    // UPDATE
    public function updateMateriel($id, $nom, $modele, $numero_serie, $localisation, $description, $id_categorie, $id_etat_materiel, $date_acquisition):void{
        $stmt = $this -> pdo -> prepare('
        UPDATE materiel
        SET nom = :nom,
            modele = :modele,
            numero_serie = :numero_serie,
            localisation = :localisation,
            description = :description,
            id_categorie = :id_categorie,
            id_etat_materiel = :id_etat_materiel,
            date_acquisition= :date_acquisition
        WHERE id_materiel = :id');
        $stmt -> execute([
            ':id'=> $id,
            ':nom'=> $nom,
            ':modele'=> $modele,
            ':numero_serie'=> $numero_serie,
            ':localisation' => $localisation,
            ':description' => $description,
            ':id_categorie' => $id_categorie,
            ':id_etat_materiel' => $id_etat_materiel,
            ':date_acquisition'=> $date_acquisition
        ]);
    }

    // barre de recherche Accueil 
    public function rechercherMateriel(string $terme):array{
        $stmt = $this -> pdo -> prepare("
        SELECT m.id_materiel, m.nom, m.modele, m.description, m.id_categorie, m.id_etat_materiel,
            c.nom AS categorie,
            em.nom_etat AS etat
        FROM materiel m
        INNER JOIN categorie c ON m.id_categorie = c.id_categorie
        INNER JOIN etat_materiel em ON m.id_etat_materiel = em.id_etat_materiel
        WHERE m.nom LIKE :terme
            OR m.modele LIKE :terme
            OR m.description LIKE :terme
            OR c.nom LIKE :terme
        ORDER BY m.nom");
        $stmt -> execute([':terme' => '%' . $terme . '%']);
        return $stmt -> fetchAll();
    }

}




