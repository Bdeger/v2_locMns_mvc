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

    public function getDemandes(): array{
        $stmt = $this->pdo->prepare("
        SELECT
            e.id_emprunt, e.date_demande, e.date_debut_souhaitee, e.date_fin_souhaitee,
            e.motif_refus, e.id_materiel, e.id_categorie, e.id_status_emprunt,

            u.nom AS nom_user,
            u.prenom AS prenom_user,

            m.nom AS nom_materiel,
            m.modele,

            c.nom AS nom_categorie,
            s.nom_status

        FROM emprunt e
        INNER JOIN utilisateur u ON e.id_utilisateur = u.id_utilisateur
        INNER JOIN statut_emprunt s ON e.id_status_emprunt = s.id_status_emprunt
        LEFT JOIN materiel m ON e.id_materiel = m.id_materiel
        LEFT JOIN categorie c ON e.id_categorie = c.id_categorie
        ORDER BY e.date_demande DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function validerEmprunt($idEmprunt, $idMateriel):void{
        try {
            $this -> pdo -> beginTransaction();
            // UPDATE 1 : l'emprunt
            $stmtEmprunt = $this-> pdo -> prepare("
            UPDATE emprunt
            SET id_status_emprunt = 2,
                date_validation = NOW(),
                id_materiel = :id_materiel
            WHERE id_emprunt = :id_emprunt
            ");

            $stmtEmprunt -> execute([
                ":id_materiel" => $idMateriel,
                ":id_emprunt" => $idEmprunt
            ]);

            // UPDATE 2 : le materiel 
            $stmtMateriel = $this -> pdo -> prepare("
            UPDATE materiel
            SET id_etat_materiel = 2
            WHERE id_materiel = :id_materiel
            ");
            $stmtMateriel -> execute([
                ":id_materiel" => $idMateriel
            ]);
            $this->pdo->commit();

        } catch (Exception $e) {
            $this -> pdo -> rollBack();
            throw $e;
        }
    }

    public function refuserEmprunt($idEmprunt, $motif): void{
        $stmt = $this->pdo->prepare("
        UPDATE emprunt
        SET id_status_emprunt = 3,
            motif_refus = :motif
        WHERE id_emprunt = :id_emprunt
        ");
        $stmt->execute([
            ":motif"      => $motif,
            ":id_emprunt" => $idEmprunt
        ]);
    }
}

