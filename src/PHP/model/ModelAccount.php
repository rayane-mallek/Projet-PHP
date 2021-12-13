<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model","Model.php"));


class ModelAccount {

	private $idAccount;
    private $username;
    private $email;
    //private $birthday;
    private $password;


    // l'attribut image est un chaine de caractère représentant

    // le lien/chemin de l'image en question
    /**
     * ModelProduct constructor.
     * @param $name
     * @param $price
     * @param $description
     * @param $image
     */
    public function __construct($username = null, $email = null, $password = null){
        if (!is_null($username) && !is_null($email) && !if_null($password)) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }
    }


    // Les Getters
    public function getIdProduct(){
        return $this->idProduct;
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

    public function setIdProduct($idProduct){
        $this->idProduct = $idProduct;
    }

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
    }

    public function save() {
        $insert_product = "INSERT INTO p__user(username, email, password) VALUES (:username, :email, :password)";

        $req_prep = Model::getPDO()->prepare($insert_product);

        $req_prep->execute([
            "username" => $this->$username,
            "price" => $this->price,
            "description" => $this->description
        ]);
    }

    public static function getAllProducts(){
        $rep = Model::getPDO()->query("SELECT * FROM p_product");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduct.php');
        $tab_prod = $rep->fetchAll();
        return $tab_prod;
    }

    public static function getProductById($idP) {
        $sql = "SELECT * FROM p_product WHERE idProduct=:idProduct";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "idProduct" => $idP
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduct');
        $tab_prod = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_prod))
            return false;
        return $tab_prod[0];
    }

    public static function getProductByName($name) {
        $sql = "SELECT * FROM p_product WHERE name=:name";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "name" => $name
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduct');
        $tab_prod = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_prod))
            return false;
        return $tab_prod[0];
    }


}

?>