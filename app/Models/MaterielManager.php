<?php

//Models/AuthManager.php

require_once __DIR__ .'/Manager.php';
class MaterielManager extends Manager{
    public function getAllMateriel():array{
        $stmt = $this->pdo->prepare("
        SELECT m.nom, m.modele, m.numero_serie, m.localisation, m.description,
            c.nom AS categorie,
            em.nom_etat AS etat
        FROM materiel m
        INNER JOIN categorie c ON m.id_categorie = c.id_categorie
        INNER JOIN etat_materiel em ON m.id_etat_materiel = em.id_etat_materiel "
        );
        $stmt -> execute();
        return $stmt -> fetchAll();
    }
}




?>