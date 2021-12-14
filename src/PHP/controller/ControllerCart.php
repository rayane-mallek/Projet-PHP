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

    public static function allProductOfCart(){ //Version tab
        //$_SESSION['cart'];
        $product_infos = array();
        $index = 0;
        foreach ($_SESSION['cart'] as $name):
            // Requete SQL pour recuperer les informations sur le produit
            $p_info = "SELECT * FROM p__product WHERE name = :name";
            // Préparation de la requete sql
            $req_prep = Model::getPDO()->prepare($p_info);
            // 
            $req_prep->execute([
                "name" => $_SESSION['cart'][$index],
            ]);
            // Transformation en tableau
            $rep_prep->setFetchMode(PDO::FETCH_ASSOC);
            $tab_infoP = $rep_prep->fetchAll();

            $product_infos[$index] = $tab_infoP;

            $index = $index + 1;
        endforeach;
        return $product_infos;
    }

}
?>