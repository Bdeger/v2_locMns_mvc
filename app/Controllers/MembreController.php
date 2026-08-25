<?php 

// app/Controllers/MembreController.php

require_once __DIR__ . "/../Views/View.php";
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../Models/UserManager.php";

class MembreController extends Controller{
    public function index():void{
        $this-> checkAdmin(); //sécurité

        $listMembre = new UserManager();
        $membre = $listMembre->getAllUsers();
        $this->view->render('admin/membre',[
            'title' => 'List Membre',
            'listMembre' => $membre,
            'membrePage' => true
        ]);
    }

    public function ajouterMembre():void{
        $this-> checkAdmin(); //sécurité

        $this->view->render('admin/ajouterMembre',[
            'title' => 'Ajouter un Membre',
            'membrePage' => true
        ]);
    }

    public function processAjouterMembre():void{
        $this-> checkAdmin(); //sécurité

        // vérifier les champs obligatoires
        if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp'])){
            $this->view->render('admin/ajouterMembre',[
                'title' => 'Ajouter un Membre',
                'membrePage' => true,
                'error' => 'Veuillez remplir tous les champs obligatoires'
            ]);
            return;
        }

        // 1. récupérer les données du formulaire
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $email = trim($_POST['email']);
        $telephone = trim($_POST['telephone'] ?? '');
        $commentaire = $_POST['commentaire'] ?? '';
        $id_statut_utilisateur = $_POST['id_statut_utilisateur'];

        // 2. hashage du mot de passe
        $mot_de_passe = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        // 3. date d'inscription automatique
        $date_inscription = date('Y-m-d');

        // 4. rôle fixé à emprunteur par défaut
        $id_role = 2;

        // 5. appeler UserManager
        $userManager = new UserManager();
        $userManager->addUser($nom, $prenom, $telephone, $email, $mot_de_passe, $date_inscription, $id_role, $id_statut_utilisateur, $commentaire);

        header('Location: /membre');
        exit;
    }
}

