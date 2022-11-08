<?php
require '../vendor/autoload.php';

require '../config.php';

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