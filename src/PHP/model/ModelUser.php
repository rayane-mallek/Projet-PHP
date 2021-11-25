<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model","Model.php"));


class ModelUser {

	private $idUser;
	private $username;
    private $password;
    private $email;

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
        $insert_user = "INSERT INTO p_user(username, password, email) VALUES (:username, :password, :email)";

        $req_prep = Model::getPDO()->prepare($insert_user);
        $req_prep->execute([
            "username" => $this->username,
            "password" => $this->password,
            "email" => $this->email
        ]);
    }


}

?>
