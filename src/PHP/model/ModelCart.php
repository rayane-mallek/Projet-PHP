<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model","Model.php"));

class ModelCart {

    private $idProduct;
    private $idUser;

    private $quantity;

    public function __construct($quantity = null){
        if (!is_null($quantity)) {
            $this->quantity = $quantity;
        }
    }

    //GETTERS

    public function getQuantity() {
        return $this->quantity;
    }

    public function getIdProduct(){
        return $this->idProduct;
    }

    public function getIdUser(){
        return $this->idUser;
    }

    //SETTERS

    public function setQuantity() {
        $this->quantity = $quantity;
    }

    //METHODES

    public function save() {
        $insert_product_cart = "INSERT INTO p__cart(idUser, idProduct, quantity) VALUES (:idUser, :idProduct, :quantity)";

        $req_prep = Model::getPDO()->prepare($insert_product_cart);

        $req_prep->execute([
            "quantity" => $this->quantity
        ]);
    }
}