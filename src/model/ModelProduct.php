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
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    // Setter générique
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    // une methode d'affichage.
    public function afficher() {v
        echo "Name : {$this->name} <br/>"; 
        echo "Email : {$this->price} <br/>";
        echo "Price : {$this->price} <br/>";
    }

}

?>