<?php
// app/Controllers/PageController.php

// pages d'information publiques (liens du pied de page)
// accessibles sans connexion : pas de checkAuth()

require_once __DIR__ . "/../Views/View.php";
require_once __DIR__ . "/Controller.php";

class PageController extends Controller{

    public function mentions(): void{
        $this->view->render('page/mentions',[
            'title' => 'Mentions légales',
            'pageInfo' => true
        ]);
    }

    public function rgpd(): void{
        $this->view->render('page/rgpd',[
            'title' => 'Données personnelles',
            'pageInfo' => true
        ]);
    }

    public function contact(): void{
        $this->view->render('page/contact',[
            'title' => 'Contact',
            'pageInfo' => true
        ]);
    }
}
