<?php 

session_start();
// public/index.php 

// charger View en premier 

require_once __DIR__ . "/../app/Views/View.php";

// 1. Récupérer  l'url depuis le .htaccess -- 
$url = $_SERVER["REQUEST_URI"];
$url = parse_url($url, PHP_URL_PATH);
$url = trim($url, '/');

if(empty($url)){
    $url = "home";
}

// 2. découper l'url 
$parts = explode("/",$url);
$controllerName = ucfirst($parts[0]). "Controller";
$action = $parts[1] ?? 'index';
$params = array_slice($parts,2);

// 3. charger le contrôleur 
$controllerFile = __DIR__ . '/../app/Controllers/' .
$controllerName . ".php";

if(!file_exists($controllerFile)){
    http_response_code(404);
    echo "<h1> Erreur 404 : contrôleur non trouvé </h1>";
    exit;
}

require_once $controllerFile;

if(!class_exists($controllerName)){
    http_response_code(404);
    echo "<h1>Erreur 404 : Classe {$controllerName} non trouvé </h1>";
    exit;
}

// instancier le contrôleur 

$controller = new $controllerName();

// verifier que la méthode existe
if(!method_exists($controller,$action)){
    http_response_code(404);
    echo "<h1> Erreur 404 : Action{$action} non trouvé </h1>";
    exit;
}

// appeler la méthode avec les paramètres
call_user_func_array([$controller, $action],$params);


?>