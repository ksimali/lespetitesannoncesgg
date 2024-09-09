<?php 
require '../vendor/autoload.php'; // on charge le fichier d'autolading de composer

$router = new AltoRouter(); // On demarre notre router

// definir une partie du chemin dans une variable
define('VIEW_PATH', dirname(__DIR__) . '/views');
// map homepage using callable
$router->map('GET', '/', function(){
    require VIEW_PATH . '/ad/index.php';
});

// map pages catégories
$router->map('GET', '/category', function(){
    require VIEW_PATH . '/category/show.php';
});

// demander aux routeur si l'url tapé correspond a une de ces routes.
$match = $router->match();

if ($match && is_callable($match['target'])) {
    // Si la route existe et est appelable
    call_user_func_array($match['target'], $match['params']);
} else {
    // Si aucune route ne correspond
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    require dirname(__DIR__) . '/views/404.php'; // Chargez une page 404 personnalisée
}

?>