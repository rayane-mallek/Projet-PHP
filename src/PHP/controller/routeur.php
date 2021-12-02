<?php

require_once File::build_path(array("controller", "ControllerProduct.php"));

// On recupère l'action passée dans l'URL
if (!isset($_GET['action'])) {
    $action = "readAll";
} else {
    $action = $_GET['action'];
}

if (!isset($_GET['action'])) {
    $controller = "product";
} else {
    $controller = $_GET['controller'];
}

$controller_class = 'Controller' . ucfirst($controller);

if (class_exists($controller_class)) {
    $allMethodsController = get_class_methods($controller_class);
    if (in_array($action, $allMethodsController)) {
        $controller_class::$action();
    } else {
        ControllerProduct::error();
    }
} else {
    ControllerProduct::error();
}

?>
