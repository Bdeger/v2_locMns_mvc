<?php 
require_once __DIR__ . "/Manager.php";

class CategorieManager extends Manager{
    public function getCategoriesAvecCompte():array{
        $stmt = $this -> pdo -> prepare("
        SELECT c.id_categorie, c.nom,
            COUNT(CASE WHEN m.id_etat_materiel = 1 THEN 1 END) AS nb_disponibles
        FROM categorie c
        LEFT JOIN materiel m ON c.id_categorie = m.id_categorie
        GROUP BY c.id_categorie, c.nom
        ORDER BY c.id_categorie");

        $stmt -> execute();
        return $stmt->fetchAll();
    }
    public function getCategorieById(int $id): ? array{
        $stmt = $this -> pdo -> prepare("
        SELECT id_categorie, nom, description
        FROM categorie
        WHERE id_categorie = ?");
        $stmt-> execute([$id]);
        return $stmt -> fetch();
    }
    
}



