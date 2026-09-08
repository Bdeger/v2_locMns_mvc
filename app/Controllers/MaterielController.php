<?php 
// app/Controllers/MaterielController.php

//controleur matériel

require_once __DIR__ . "/../Views/View.php"; 
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../Models/MaterielManager.php";

class MaterielController extends Controller{
    public function index(): void{
    $this->checkAdmin();

    $materielManager = new MaterielManager();
    $listMateriel = $materielManager->getAllMateriel();

    // comptage par état sur TOUT le matériel
    $compteursEtat = [1 => 0, 2 => 0, 3 => 0, 4 => 0];
    $compteursCat  = [1 => 0, 2 => 0, 3 => 0, 4 => 0];

    foreach($listMateriel as $m){
        $compteursEtat[$m['id_etat_materiel']]++;
        $compteursCat[$m['id_categorie']]++;
    }

    $total = count($listMateriel);

    // filtres
    $filtreEtat = $_GET['etat'] ?? null;
    $filtreCat  = $_GET['categorie'] ?? null;

    if(!empty($filtreEtat) || !empty($filtreCat)){
        $filtres = [];
        foreach($listMateriel as $m){
            $okEtat = empty($filtreEtat) || $m['id_etat_materiel'] == $filtreEtat;
            $okCat  = empty($filtreCat)  || $m['id_categorie'] == $filtreCat;

            if($okEtat && $okCat){
                $filtres[] = $m;
            }
        }
        $listMateriel = $filtres;
    }

    $this->view->render('admin/materiel',[
        'title' => 'Liste Matériel',
        'listMateriel' => $listMateriel,
        'compteursEtat' => $compteursEtat,
        'compteursCat' => $compteursCat,
        'total' => $total,
        'filtreEtat' => $filtreEtat,
        'filtreCat' => $filtreCat,
        'materielPage' => true
    ]);
    }
    public function ajouter():void{
        $this->checkAdmin(); //sécurité

        $this ->view -> render('admin/ajouter',[
        'title'=> 'Ajouter un matériel',
        'materielPage' =>true
      ]);
    }
    public function processAjouter():void{
        $this->checkAdmin(); //sécurité

        // on vérifie que les champs sont bien remplis
        if(empty($_POST['nom'])||empty($_POST['modele'])||empty($_POST['numero_serie'])||empty($_POST['localisation'])||empty($_POST['id_categorie'])||empty($_POST['id_etat_materiel'])){
            $this->view->render('admin/ajouter',[
                'title'=>'Ajouter',
                'error'=>'Veuillez remplir tous les champs'
            ]);
            return;
        };

        // 1. récupérer les données du formulaire
        $nom = trim($_POST['nom']);
        $modele = trim($_POST['modele']);
        $numero_serie =trim($_POST['numero_serie']);
        $localisation =trim($_POST['localisation']);
        $id_categorie = $_POST['id_categorie'];
        $id_etat_materiel=$_POST['id_etat_materiel'];
        $date_acquisition = $_POST['date_acquisition'];
        $description= $_POST["description"];

        $date_acquisition = date('Y-m-d');
        // 2. appeler materielManager
        $materielManager = new MaterielManager();
        $materielManager->addMateriel($nom, $modele, $numero_serie, $localisation, $description, $id_categorie, $id_etat_materiel, $date_acquisition);
        header('Location: /materiel');
        exit;
    }

    // CRUD : DELETE
    public function supprimer($id):void{
        $this->checkAdmin(); //sécurité

        $materielManager = new MaterielManager();
        $materielManager -> deleteMateriel($id);
        header('Location: /materiel');
        exit;
    }
    // CRUD : UPDATE

    public function modifier($id):void{
        $this->checkAdmin(); //sécurité

        $materielManager = new MaterielManager();
        $materiel = $materielManager -> getMaterielById($id);
        $this -> view -> render('admin/modifier',[
            'title' => 'Modifier un matériel',
            'materiel' => $materiel,
            'materielPage' => true
        ]);
    }
    public function processModifier($id):void{
        $this->checkAdmin(); //sécurité

        if(empty($_POST['nom'])||empty($_POST['modele'])||empty($_POST['numero_serie'])||empty($_POST['localisation'])||empty($_POST['id_categorie'])||empty($_POST['id_etat_materiel'])){
        $this->view->render('admin/modifier',[
            'title'=>'Modifier',
            'error'=>'Veuillez remplir tous les champs'
        ]);
        return;
    };
           // 1. récupérer les données du formulaire
        $nom = trim($_POST['nom']);
        $modele = trim($_POST['modele']);
        $numero_serie =trim($_POST['numero_serie']);
        $localisation =trim($_POST['localisation']);
        $id_categorie = $_POST['id_categorie'];
        $id_etat_materiel=$_POST['id_etat_materiel'];
        $date_acquisition = $_POST['date_acquisition'];
        $description= $_POST["description"];

        // 2. appeler materielManager
        $materielManager = new MaterielManager();
        $materielManager->updateMateriel($id, $nom, $modele, $numero_serie, $localisation, $description, $id_categorie, $id_etat_materiel, $date_acquisition);
        header('Location: /materiel');
        exit;
    }

}




