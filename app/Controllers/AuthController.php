<?php 
// app/Controllers/AuthController.php

// controller pour la page de connexion

require_once __DIR__ . '/../Views/View.php';

require_once __DIR__ .'/Controller.php';

require_once __DIR__ .'/../Models/UserManager.php';

class AuthController extends Controller{
    public function login():void{
        // afficher la page de connexion

        $this->view->render(
            'auth/login',
            ['title'=>'Connexion']
        );
    }
    public function logout():void{
        session_destroy();
        header('Location: /');
        exit;
    }
    public function processLogin():void{
        // méthode pour traiter le formulaire quand l'utilisateur clique sur se connecter

        // on vérifie que les champs sont bien remplis
         if(empty($_POST['email'])|| empty($_POST['pwd'])){
                $this ->view->render('auth/login',[
                    'title'=>'Connexion',
                    'error'=> 'Veuillez remplir tous les champs'
                ]);
                return;
            }
            // 1. récupérer les données du formulaire
            $email = trim($_POST['email']); 
            // validate()
            $pwd = $_POST['pwd'];
            
            // 2. Appeler UserManager
            $userManager = new UserManager();
            $user = $userManager -> findByEmail($email);

            // // DEBUG TEMPORAIRE
            // var_dump($user);
            // var_dump(password_verify($pwd, $user['mot_de_passe'])); //
            // exit;

            // 3.vérifier email + mot de passe
           
            if($user && password_verify($pwd, $user['mot_de_passe'])){
                // 4. créer la session
                $_SESSION['user']=[
                    'id' => $user['id_utilisateur'],
                    'nom' => $user['nom'],
                    'prenom' => $user['prenom'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];

                // 5. Rediréction selon rôle 
                if($user['id_role']== 1){
                    header('Location: /admin/dashboard');
                }else{
                    header('Location: /user/accueil');
                }
                exit;
            }else{
                $this -> view->render('auth/login',[
                    'title'=> 'connexion',
                    'error'=> 'Email ou mot de passe incorrect'
                ]);
            }
    }

}
