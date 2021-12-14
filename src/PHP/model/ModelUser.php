<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model","Model.php"));


class ModelUser {

	private $idUser;
	private $username;
    private $email;
    private $password;

    // Le Constructeur
    public function __construct($username = NULL, $email = NULL, $password = NULL) {
        if (!is_null($username) && !is_null($email) && !is_null($password)) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }
    }
    // Les Getters
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }

    // Les setters
    public function setUsername($username){
        $this->username = $username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setEmail($email){
        $this->email = $email;
    }


    // une methode d'affichage.
    public function afficher() {
        echo "Username : {$this->username} <br/>";
        echo "Email : {$this->email} <br/>";
    }


    // Methode pour inserer un nouveau user dans la table User
    public function save() {
        $insert_user = "INSERT INTO p__user(username, password, email) VALUES (:username, :password, :email)";

        $req_prep = Model::getPDO()->prepare($insert_user);
        $req_prep->execute([
            "username" => $this->username,
            "password" => $this->password,
            "email" => $this->email
        ]);
        
        $sql = "SELECT idUser from p__user WHERE email=:email";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "email" => $this->email,
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);
        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
        $tab_id = $req_prep->fetchAll();

        //$idUser => $tab_id;

    }

    public static function getUSerByName($username) {
        $sql = "SELECT * from p__user WHERE username=:username";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "username" => $username
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');

        $tab_us = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_us))
            return false;
        return $tab_us[0];
    }

    public static function updateNonce($username) {
        $sql = "UPDATE p__user SET nonce = :nonce WHERE username = :username";
        $values = array(
            "nonce" => NULL,
            "username" => $username
        );
        $req_prep = Model::getPDO()->prepare($sql);
        $req_prep->execute($values);
    }

    public static function getNonce($username) {
        $sql = "SELECT nonce FROM p__user WHERE username = :username";
        $values = array(
            "username" => $username
        );
        $req_prep = Model::getPDO()->prepare($sql);
        $req_prep->execute($values); 
    }


}

?>
