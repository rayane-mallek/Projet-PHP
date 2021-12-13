<?php
require_once File::build_path(array("model","ModelAccount.php"));

class ControllerAccount {

    public static function login() {
        $pagetitle = 'Hack-King - Connexion';
        $controller='account';
        $view='login';
        require File::build_path(array("view","view.php")); ;  //"redirige" vers la vue
  }

  public static function register() {
    $pagetitle = 'Hack-King - Register';
    $controller='account';
    $view='register';
    require File::build_path(array("view","view.php")); ;  //"redirige" vers la vue
  }
}

?>