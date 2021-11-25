<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("..","config","Conf.php"));


class ModelProduct {

	private $idProduct;
    private $name;
    private $price;
    private $description;

    // Le Constructeur

    /**
     * ModelProduct constructor.
     * @param $idProduct
     * @param $name
     * @param $price
     * @param $description
     */
    public function __construct($name, $price, $description){
        if (!is_null($name) && !is_null($price) && !is_null($description)) {
            $this->name = $name;
            $this->price = $price;
            $this->description = $description;
        }
    }

    // Les Getters
    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getDescription(){
        return $this->description;
    }

    // Les Setters
    public function setName($name){
        $this->name = $name;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    // une methode d'affichage.
    public function afficher() {
        echo "Name : {$this->name} <br/>";
        echo "Email : {$this->price} <br/>";
        echo "Price : {$this->price} <br/>";
    }

    public function save() {
        $insert_product = "INSERT INTO p_product(name, price, description) VALUES (:name, :price, :description)";

        $req_prep = Model::getPDO()->prepare($insert_product);

        $req_prep->execute([
            "name" => $this->name,
            "price" => $this->price,
            "description" => $this->description
        ]);
    }

    public function getAllProducts(){

    }
}

?>
