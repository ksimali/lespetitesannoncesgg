<?php 
require '../vendor/autoload.php'; // on charge le fichier d'autolading de composer

$router = new AltoRouter(); // On demarre notre router

// map homepage using callable
$router->map('GET', '/', function(){
    require dirname(__DIR__) . '/views/ad/index.php';
});

// map pages catégories
$router->map('GET', '/category', function(){
    require dirname(__DIR__) . '/views/category/show.php';
});

// demander aux routeur si l'url tapé correspond a une de ces routes.
$match = $router->match();
$match['target']();
?>