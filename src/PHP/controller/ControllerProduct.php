<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model", "ModelProduct.php"));


class ControllerProduct {
    public static function readAll() {
        $tab_p = ModelProduct::getAllProducts();     //appel au modèle pour gerer la BD
        require ('../view/product/list.php');  //"redirige" vers la vue
    }

    public static function read() {
        $tab_p = ModelProduct::getAllProducts();

        foreach ($tab_p as $product) {
            if ($product == $_GET['idProduct']) {
                $p = $product;
            }
        }

        if (empty($tab_prod)) {
            require ('../view/product/error.php');
        } else {
            require ('../view/product/detail.php');
        }
    }

    public static function create() {
        require ('../view/product/create.php');
    }

    public static function created() {
        $product = new ModelProduct($_POST['name'], $_POST['price'], $_POST['description'],$_POST['image']);
        $product->save();
        self::readAll();
    }
}
?>