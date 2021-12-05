<?php
require_once File::build_path(array("model","ModelProduct.php"));

class ControllerProduct {

    public static function read() {
    	$p = ModelProduct::getProductByName($_GET['name']);

    	if (empty($p)) {
            $controller = 'product';
            $view = 'error';
            $pagetitle = 'Error';
    		require File::build_path(array("view", "view.php"));

    	} else {
            $controller = 'product';
            $view = 'detail';
            $pagetitle = 'Product details';
    		require File::build_path(array("view", "view.php"));
    	}
    }

    public static function create() {
        $controller = 'product';
        $pagetitle = 'Create a product';
        $view = 'create';
        require_once File::build_path(array("view","view.php"));
    }

    public static function created() {
        $product = new ModelProduct($_POST['name'], $_POST['price'], $_POST['description'], $_POST['image']);
    	$product->save();
        $tab_p = ModelProduct::getAllProducts();

        $controller = 'product';
        $pagetitle = "Product created";
        $view = "created";
        require File::build_path(array("view", "view.php"));
    }
}

?>