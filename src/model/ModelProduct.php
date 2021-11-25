<?php

class ModelProduct {

	private $idProduct;
	private $name;
	private $price;
	private $description;

	// un constructeur
    public function __construct($name = NULL, $price = NULL, $description = NULL) {
        if (!is_null($name) && !is_null($price) && !is_null($description)) {
            $this->name = $name;
            $this->price = $price;
            $this->description = $description;
        }
    }

    // Getter générique
    /*public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }*/

    // Les Getters

    public function getIdProduct(){
        return $idProduct;
    }

    public function getName(){
        return $name;
    }

    public function getPrice(){
        return $price;
    }

    public function getDescription(){
        return $description;
    }

    // Setter générique
    /*public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }*/

    // Les Setters

    

    // une methode d'affichage.
    public function afficher() {
        echo "Name : {$this->name} <br/>";
        echo "Email : {$this->price} <br/>";
        echo "Price : {$this->price} <br/>";
    }

    public function save() {
        $insert_product = "INSERT INTO product(name, price, description) VALUES (:name, :price, :description)";

        $req_prep = Model::getPDO()->prepare($insert_product);

        $req_prep->execute([
            "name" => $this->name,
            "price" => $this->price,
            "description" => $this->description
        ]);
    }
}

?>
