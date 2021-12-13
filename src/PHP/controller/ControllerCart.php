<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model", "ModelCart.php"));


class ControllerCart {

    public static function addtocart() {
        array_push($_SESSION['cart'], $_GET['name']);
        $tab_p = ModelProduct::getAllProducts();

        $controller = 'cart';
        $pagetitle = 'Added to cart';
        $view = 'addedtocart';
        require_once File::build_path(array("view","view.php"));
    }

    public static function removefromcart() {
        if (($key = array_search($_GET['name'], $_SESSION['cart'])) !== false) {
            unset($_SESSION['cart'][$key]);
        }

        $tab_p = ModelProduct::getAllProducts();

        $controller = 'product';
        $pagetitle = 'List of products';
        $view = 'list';
        require_once File::build_path(array("view","view.php"));
    }

    public static function readAll(){
        $tab_p = array();
        foreach($_SESSION['cart'] as $product) {
            array_push($tab_p, ModelProduct::getProductByName($product));
        }

        $pagetitle = 'My cart';
        $controller='cart';
        $view='list';
        require File::build_path(array("view","view.php"));

    }

}
?>