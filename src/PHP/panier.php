<?php

class ModelCart {


	public function allProductOfCart(){ //Version tab
		//$_SESSION['cart'];
		$product_infos = array();
		$index = 0;
		foreach ($_SESSION['cart'] as $name):
            // Requete SQL pour recuperer les informations sur le produit
            $p_info = "SELECT * FROM p__product WHERE name = :name";
            // Préparation de la requete sql
	        $req_prep = Model::getPDO()->prepare($p_info);
	        // 
	        $req_prep->execute([
	            "name" => $_SESSION['cart'][$index];
	        ]);
	        // Transformation en tableau
	        $rep_prep->setFetchMode(PDO::FETCH_ASSOC);
			$tab_infoP = $rep_prep->fetchAll();

			$product_infos[$index] = $tab_infoP;

	        $index = $index + 1;
        endforeach;
        return $product_infos;
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

		public static function getCart(){
			$rep = Model::getPDO()->query("SELECT * FROM p__cart");
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCart');
			$tab_c = $rep->fetchAll();

			return $tab_c;
		}

}

?>