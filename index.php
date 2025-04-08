<?php
// index.php - root file
// Autoload classes
spl_autoload_register(function($className) {
    // Controllers
    if (file_exists("controllers/{$className}.php")) {
        require_once "controllers/{$className}.php";
        return true;
    }

    // Models
    if (file_exists("models/{$className}.php")) {
        require_once "models/{$className}.php";
        return true;
    }

    return false;
});

// Include routes file
require_once 'routes.php';

// Get the action from the URL
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Route the request
route($action, $id);
?>