<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model","Model.php"));


class ModelCart {

		private $user;  // Instance de la classe User
		private $product;  // Instance de la classe Product
		private $quantity;

		/**
		 * ModelCart constructor.
		 * @param $user
		 * @param $product
		 * @param $quantity
		 */
		public function __construct($user, $product, $quantity){
			if (!is_null($user) && !is_null($product) && !is_null($quantity)) {
				$this->user = $user;
				$this->product = $product;
				$this->quantity = $quantity;
			}
		}

	    // Les Getters
		public function getUser(){
			return $this->user;
		}

		public function getProduct(){
			return $this->product;
		}

		public function getQuantity(){
			return $this->quantity;
		}

		//Les Setters
		public function setUser($user){
			$this->user = $user;
		}

		public function setProduct($product){
			$this->product = $product;
		}

		public function setQuantity($quantity){
			$this->quantity = $quantity;
		}

		public function save() {
	        $insert_cart = "INSERT INTO p__cart(idUser, idProduct, quantity) VALUES (:idUser, :idProduct, :quantity)";

	        $req_prep = Model::getPDO()->prepare($insert_cart);

	        $req_prep->execute([
	            "idUser" => $this->user->getIdUser(),
	            "idProduct" => $this->product->getIdProduct(),
	            "quantity" => $this->quantity
	        ]);
	    }
	}

?>
