<?php

    require_once './PHP/config/Conf.php';

  if ((isset($_SESSION['id']))){ //si une session existe déja (= utilisateur connecté) on redirige vers la page d'accueil
    header('Location: ./index.php');
    exit;
  }

  
  if(!empty($_POST)){ // Si la variable "$_Post" contient des informations alors on les traites
    extract($_POST); //extrait les valeurs du form en 2 variables $email $password
    
    $ok = true;


  if (isset($_POST['connexion'])){ //test pour le formulaire "inscription"

    //htmlentites = pour éviter les injections, trim = enleve les espaces au début et a la fin
    $email = htmlentities(strtolower(trim($email)));
    $password = trim($_POST['password']);

    if(empty($email)){ //test si email est vide
      $ok = false;
      $er_email = "L'email est vide";
    }

    if(empty($password)){ //test si le password est vide
      $ok = false;
      $er_password = "Le mot de passe est vide";
    }
      
        
    $options = ['cost' => 12];  
    //$password = password_hash($password, PASSWORD_BCRYPT, $options);  //on crypte le password avec la meme clé que pour l'inscription

    $req = Model::getPDO()->prepare("SELECT password FROM p__user WHERE email = :email"); 
    $req->execute(array('email' => $email));
    $hash = $req->fetchAll();
    $hashed_pwd = $hash[0]['password'];

    //on test si les valeurs du formulaire correspondent a la bdd
    if (!password_verify($password, $hashed_pwd)) { 
      $ok = false;
      $er_email = "Le mail ou le mot de passe est incorrect";
    }

    $req = Model::getPDO()->prepare("SELECT * FROM p__user WHERE email = :email"); 
    $req->execute(array('email' => $email));
    $resultat = $req->fetchAll();

    if ($ok){
     //si tout est valide, alors on charge une session avec les attributs de la requete
      $_SESSION['id'] = $resultat[0]['idUser']; 
      $_SESSION['username'] = htmlentities($resultat[0]['username']); //htmlentities pour éviter les injections html/php
      $_SESSION['email'] = htmlentities($resultat[0]['email']);


      header('Location: ./index.php'); //on redirige l'utilisateur vers la page d'accueil
      exit;
    }

  }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Log in</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="./assets/css/vanilla-zoom.min.css">
</head>

<body>
    <section class="full_box_login">
        <div class="container_form_log">
            <div class="block-heading">
                <h2 class="text-info"><strong>Log in</strong></h2>
            </div>
            <p><br>Login form</p>
            <form method="post" class="login_form">
              <?php
              if (isset($er_email)){ //si $er_mail n'est pas vide, alors on l'affiche
              ?>
                 <div><?= $er_email ?></div>
              <?php
                }
              ?>
                <div class="mb-3"><label class="form-label" for="email" style="color: white; font-family: TommyTHIN, Arial;"><strong> Email</strong><br></label>
                  <input class="form-control" type="email" id="email" placeholder=" email" name="email" value="<?php if(isset($email)){ echo $email; }?>" required></div>
                  <?php
                  if (isset($er_password)){ //si $er_password n'est pas vide, alors on l'affiche
                  ?>
                    <div><?= $er_password ?></div>
                  <?php
                    }
                  ?>
                  <br>
                <div class="mb-3">
                  <label class="form-label" for="password">
                    <strong style="color: white; font-family: TommyTHIN, Arial;">Password</strong>
                    <br>
                  </label>
                  <input class="form-control" type="password" id="password" placeholder="password" name="password">
                </div>
                <div class="mb-3">
                </div>
                <button class="btn btn-primary text-center" name="connexion" type="submit">Log in</button>
                <div>
                </div>
                <p>Not yet registered?</p>
                <a href="./index.php?controller=account&action=register">Register</a>
                <div>
                </div>
                <a href="./index.php?controller=account&action=resetpassword">Forgot password ?</a>
            </form>
        </div>
    </section>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="./assets/js/vanilla-zoom.js"></script>
    <script src="./assets/js/theme.js"></script>
</body>


</html>