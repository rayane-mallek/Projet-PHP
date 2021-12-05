<?php

if (!isset($_GET['action'])) {
    $controller = 'accueil';
    $view = 'home';
    $pagetitle = 'Accueil';
    require File::build_path(array("view", "view.php"));   
} else {
    $action = $_GET['action'];
}

?>