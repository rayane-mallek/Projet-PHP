<?php

require_once File::build_path(array("controller", "ControllerProduct.php"));

if (!isset($_GET['action'])) {
    $controller = 'accueil';
    $view = 'home';
    $pagetitle = 'Accueil';
    require File::build_path(array("view", "view.php"));   
} else {
    $action = $_GET['action'];
    ControllerProduct::$action();
}

?>