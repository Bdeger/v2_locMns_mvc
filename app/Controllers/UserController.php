<?php
// app/Controllers/UserController.php 

// Dashboard """emprunteur""" 

require_once __DIR__ . "/../Views/View.php";
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../Models/MaterielManager.php";
require_once __DIR__ . "/../Models/CategorieManager.php";

class UserController extends Controller{
    public function accueil():void{
        $listMateriel = new MaterielManager();
        $materiel = $listMateriel -> getAllMateriel();
        $listCategorie = new CategorieManager();
        $categorie = $listCategorie -> getCategoriesAvecCompte();
        $this -> view -> render('user/accueil',[
            'title' => "Votre Espace",
            'listMateriel' =>$materiel,
            'listCategorie'=> $categorie,
            "accueil" => true 
        ]);
    }
    public function categorie($id):void{
        $dateDebut = $_GET['date_debut']?? date('Y-m-d');
        $dateFin = $_GET['date_fin'] ?? date('Y-m-d', strtotime('+7 days'));

        $materielManager = new MaterielManager();
        $materielDispo = $materielManager -> getMaterielDisponibleParCategorie($id, $dateDebut, $dateFin);

        $categorieManager = new CategorieManager();
        $categorieInfo = $categorieManager -> getCategorieById($id);
        
        $this -> view -> render('user/categorie',[
            'title' => 'Matériel Disponible',
            'listMateriel' => $materielDispo,
            'dateDebut' => $dateDebut,
            'dateFin' => $dateFin, 
            'categorieInfo' => $categorieInfo,
            'categorie' => true
        ]);
    }
    

}





