<?php

$ROOT_FOLDER = __DIR__;
$DS = DIRECTORY_SEPARATOR;
require_once $ROOT_FOLDER . $DS . '..' . $DS . 'lib' . $DS . 'File.php';

require_once File::build_path(array("model", "ModelUser.php"));


class ControllerUser {

  public static function create(){
    $controller='user';
    $view='create'
    $pagetitle = 'Form';
    require File::build_path(array("view", "view.php"));
  }


  public static function created(){
    if ((isset($_SESSION['id']))){ //si une session existe déja (= utilisateur connecté) on redirige vers la page d'accueil
      header('Location: ../index.php');
      exit;
    }
    $valid = true;

    if(!empty($_POST['formregister'])){ //si le formulaire est vide ne rien faire
      extract($_POST); //extrait les valeurs du form en 4 variables $pseudo $email $mdp $confmdp
    
      if(isset($_POST['formregister'])){
        
        if( !empty($password) && !empty($cpassword) && !empty($semail) && !empty($username)){

          //si la structure de l'email n'est pas valide
          if(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $semail)){
            $valid = false;
            echo "<p>Invalid email</p>";
          }
      
          // Verification que l'email n'a pas été déjà utilisé pour un autre compte
          $sqlEmail = "SELECT * from p__user WHERE email=:email";

          $req_prepE = Model::getPDO()->prepare($sqlEmail);
          $values = array("email" => $semail);
          $req_prepE->execute($values);

          $req_prepE->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
          $tab_ve = $req_prepE->fetchAll();

          $resultE = $tab_ve->rowCount();

          if($resultE != 0){
            $valid = false;
            echo "<p>Email address already used</p>";
          }

          // Verification que le username n'a pas été déjà utilisé pour un autre compte
          $sqlUser = "SELECT * from p__user WHERE username=:username";

          $req_prepU = Model::getPDO()->prepare($sqlUser);
          $values = array("username" => $username);
          $req_prepU->execute($values);

          $req_prepU->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
          $tab_vu = $req_prepU->fetchAll();

          $resultU = $tab_vu->rowCount();

          if($resultU != 0){
            $valid = false;
            echo "<p>Username already used</p>";
          }

          // Verification de la taille du password : longueur du pw >= 7
          if (strlen($password )>= 8){
            if ($password == $cpassword){
              $options = ['cost' => 12];
              $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);
            } else {
              $valid = false;
              echo "<p>Invalid password confirmation</p>";
            }
          } else {
            $valid = false;
            echo "<p>Invalid password</p>";
            echo "<p>The password must be at least 8 characters long</p>";
          }
        }
      }
    }

    if($valid){
      $user = new ModelUser($username, $semail, $hashpass);
      $user->save();
      $controller='user';
      $view='created'
      $pagetitle = 'Create';
      require File::build_path(array("view", "view.php"));
    }


  }

  public static function login(){
    $controller='user';
    $view='login'
    $pagetitle = 'Login Form';
    require File::build_path(array("view", "view.php"));
  }


  public static function connected(){

  }

}