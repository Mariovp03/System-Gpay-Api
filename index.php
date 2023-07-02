<?php 
require 'Config.php';
require __DIR__ . '/vendor/autoload.php';
require 'Routes/Router.php';
include_once 'Views/HeaderView.php';

session_start();

try{
    
    $uriExplode = explode("/", $_SERVER["REQUEST_URI"]);
    // var_dump($uriExplode);
    $request = $_SERVER['REQUEST_METHOD'];
   
    $paramsGet = explode("?", $uriExplode[3]);
    
    if(!isset($router[$request])){
        throw new Exception("A rota não existe!");
    }

    if(!array_key_exists($paramsGet[0], $router[$request])){
        throw new Exception("A rota não existe!");
    }
    
    $controller = $router[$request][$paramsGet[0]]; 
    
    $controller();
    
} catch(Exception $e){

    echo $e->getMessage();

}

include_once 'Views/FooterView.php';