<?php

	class ModelCart {

		private $user;  // Instance de la classe User
		private $product;  // Instance de la classe Product
		private $quantity; 

		// un constructeur
	    public function __construct($user = NULL, $product = NULL, $quantity = NULL) {
	        if (!is_null($user) && !is_null($product) && !is_null($quantity)) {
	            $this->user = $name;
	            $this->product = $price;
	            $this->quantity = $description;
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
	}

?>