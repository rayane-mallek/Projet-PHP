<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
</head>
<body>
<nav>
    <?php

    $ROOT_FOLDER = __DIR__;
    $DS = DIRECTORY_SEPARATOR;
    require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

    require_once File::build_path(array("lib","navbar.php")); //il existe pas encore

    ?>
</nav>

<?php
// Si $controleur='cart' et $view='list',
// alors $filepath="/chemin_du_site/view/cart/list.php"
$filepath = File::build_path(array("view", $controller, "$view.php"));
require $filepath;
?>

<p style="border: 1px solid black;text-align:right;padding-right:1em;">
    Euh cart
</p>
</body>
</html>
