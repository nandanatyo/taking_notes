<?php

spl_autoload_register(function($className) {

    if (file_exists("controllers/{$className}.php")) {
        require_once "controllers/{$className}.php";
        return true;
    }


    if (file_exists("models/{$className}.php")) {
        require_once "models/{$className}.php";
        return true;
    }

    return false;
});


require_once 'routes.php';


$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$id = isset($_GET['id']) ? $_GET['id'] : null;


route($action, $id);
?>