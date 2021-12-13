<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model","Model.php"));


class ModelCommande {

		// Instance de la classe Product
		// Instance de la classe User
		// Date courante // (link : https://www.php.net/manual/fr/function.date.php)
		private $idCommande; // Pas forcément utile
		private $user;
		private $product;
		private $date;
		private $quantity;

		// Le Constructeur
		public function __construct($user = NULL, $product = NULL, $quantity = NULL) {
	        if (!is_null($user) && !is_null($product) && !is_null($quantity)) {
	            $this->user = $user;
	            $this->product = $product;

	            $this->date = date("D, d M Y ");
	            // la fonction date(string $format, ?int $timestamp = null) renvoie une date sous forme de String
	            $this->quantity = $quantity;
	        }
	    }

	    // Les Getters
		public function getUser(){ return $this->user; }

		public function getProduct(){ return $this->product; }

		public function getDate(){ return $this->date; }

		public function getQuantity(){ return $this->quantity; }

		// Les Setters
		public function setUser($user){
			$this->user = $user;
		}

		public function setProduct($product){
			$this->product = $product;
		}

		public function setDate($date){
			$this->date = $date;
		}

		public function setQuantity($quantity){
			$this->quantity = $quantity;
		}


		public function save() {
	        $insert_cmd = "INSERT INTO p__commande(idUser, idProduct, date, quantity) VALUES (:idUser, :idProduct, :date, :quantity)";

	        $req_prep = Model::getPDO()->prepare($insert_cmd);

	        $req_prep->execute([
	            "idUser" => $this->user->idUser,
	            "idProduct" => $this->product->idProduct,
	            "date" => $this->date,
	            "quantity" => $this->quantity
	        ]);
	    }

	}

?>

