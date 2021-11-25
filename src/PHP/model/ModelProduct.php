<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model","Model.php"));


class ModelProduct {

	private $idProduct;
    private $name;
    private $price;
    private $description;
    private $image;

    // l'attribut image est un chaine de caractère représentant
    // le lien/chemin de l'image en question


    // Les Getters
    /**
     * ModelProduct constructor.
     * @param $name
     * @param $price
     * @param $description
     * @param $image
     */
    public function __construct($name, $price, $description, $image){
        if (!is_null($name) && !is_null($price) && !is_null($description) && !is_null($image)) {
            $this->name = $name;
            $this->price = $price;
            $this->description = $description;
            $this->image = $image;
        }
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }
    public function getDescription(){
        return $this->description;
    }

    public function getImage(){return $this->image;}

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

    public function setImage($image){
        $this->image = $image;
    }

    // une methode d'affichage.
    public function afficher() {
        echo "Name : {$this->name} <br/>";
        echo "Price : {$this->price} <br/>";
        echo "Description : {$this->description} <br/>";
        /*
        echo "Image : <br/>";
        ?>
        <img src="<?php echo $this->image; ?>" alt="[image du produit]">"
        <?php
        */
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
        $rep = Model::getPDO()->query("SELECT * FROM p_product");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduct.php');
        $tab_prod = $rep->fetchAll();
        return $tab_prod;
    }
}

?>
