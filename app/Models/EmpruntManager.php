<?php 
require_once __DIR__ . "/Manager.php";

class EmpruntManager extends Manager{
    public function addEmprunt($idMateriel, $idCategorie, $idUtilisateur, $dateDebut, $dateFin):void{
        $stmt = $this -> pdo -> prepare("
        INSERT INTO emprunt(id_materiel, id_categorie, id_utilisateur, date_debut_souhaitee , date_fin_souhaitee, date_demande, id_status_emprunt)
        VALUES(:id_materiel, :id_categorie, :id_utilisateur, :date_debut_souhaitee, :date_fin_souhaitee, NOW(), 1)"
        );
        $stmt -> execute([
            ":id_materiel" => $idMateriel,
            ":id_categorie" => $idCategorie,
            ":id_utilisateur" => $idUtilisateur,
            ":date_debut_souhaitee" => $dateDebut,
            ":date_fin_souhaitee" => $dateFin
        ]);
    }
}



?>
<!-- 
-------------------------------------------------------
ID   Statut            qui déclanche           vers
--------------------------------------------------------
1	En attente	  Emprunteur (INSERT)	      2 ou 3
2	Validé	          Admin	                  4
3	Refusé	          Admin	                  fin
4	En cours	 Admin (remise du matériel)	  5
5	Terminé	         Admin (retour)	          fin
-------------------------------------------------------
-->