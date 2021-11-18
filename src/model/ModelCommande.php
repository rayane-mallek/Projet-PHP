<?php

	class ModelCommande {

		private $idCommande; // Pas forcément utile
		private $user;  // Instance de la classe User
		private $product;  // Instance de la classe Product
		private $date;  // Date courante
		private $quantity


		// un constructeur
	    public function __construct($user = NULL, $product = NULL, $quantity = NULL) {
	        if (!is_null($user) && !is_null($product) && !is_null($quantity)) {
	            $this->user = $user;
	            $this->product = $product;

	            $this->date = date("D, d M Y "); 
	            // la fonction date(string $format, ?int $timestamp = null) renvoie une date sous forme de String
	            $this->quantity = $quantity;
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