<?php 
require 'Config.php';
require __DIR__ . '/vendor/autoload.php';
require 'Routes/Router.php';
include_once 'Views/HeaderView.php';

session_start();

try{
    
    $uriExplode = explode("/", $_SERVER["REQUEST_URI"]);

    $request = $_SERVER['REQUEST_METHOD'];
    
    if(!isset($router[$request])){
        throw new Exception("A rota não existe!");
    }
    
    if(!array_key_exists($uriExplode[3], $router[$request])){
        throw new Exception("A rota não existe!");
    }
    
    $controller = $router[$request][$uriExplode[3]]; 
    
    $controller();
    
} catch(Exception $e){

    echo $e->getMessage();

}

include_once 'Views/FooterView.php';
?>
<script src="./Views/Assets/Jquery.js"></script>
