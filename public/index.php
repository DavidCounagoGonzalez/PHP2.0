<?php
require '../vendor/autoload.php';
        
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

var_dump($_ENV);
$folder = $_ENV['folder.views']; 
echo $folder;
die();

try{
    Com\Daw2\Core\FrontController::main();
} catch (Exception $ex) {
    if($config->get('DEBUG')){
        throw $e;
    }
    else{
        echo $e->getMessage();
    }
}