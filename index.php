<?php 
require 'config.php';
require __DIR__ . '/vendor/autoload.php';
require 'Routes/Router.php';
session_start();
try{
    
    $uri = str_replace($_SERVER["REQUEST_URI"], URL_BASE, '');
    
    $request = $_SERVER['REQUEST_METHOD'];

    if(!isset($router[$request])){
        throw new Exception("A rota não existe!");
    }

    if(!array_key_exists($uri, $router[$request])){
        throw new Exception("A rota não existe!");
    }

    $controller = $router[$request][$uri]; 
    
    $controller();
    
} catch(Exception $e){

    echo $e->getMessage();

}