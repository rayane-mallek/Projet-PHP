<?php

class ModelUser {

	private $idUser; // Pas forcément utile
	private $username;
	private $password;
	private $email;


	// un constructeur
    public function __construct($username = NULL, $email = NULL, $password = NULL) {
        if (!is_null($username) && !is_null($email) && !is_null($password)) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
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
    public function afficher() {
        echo "Username : {$this->username} <br/>"; 
        echo "Email : {$this->email} <br/>";
    }


    // Methode pour inserer un nouveau user dans la table User
    
    public function save() {
        $insert_user = "INSERT INTO user(username, password, email) VALUES (:username, :password, :email)";
        
        /*$values = array(
            "username" => $this->username,
            "password" => $this->password,
            "email" => $this->email
        );*/

        $req_prep = Model::getPDO()->prepare($insert_user);
        $req_prep->execute([
            "username" => $this->username,
            "password" => $this->password,
            "email" => $this->email
        ]);
    }


}

?>