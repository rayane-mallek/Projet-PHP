<?php

require_once './PHP/config/Conf.php';

function generateRandomHex() {
  // Generate a 32 digits hexadecimal number
  $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
  $bytes = openssl_random_pseudo_bytes($numbytes); 
  $hex   = bin2hex($bytes);
  return $hex;
}


if ((isset($_SESSION['id']))){ //si une session existe déja (= utilisateur connecté) on redirige vers la page d'accueil
    header('Location: ../index.php');
    exit;
  }

if(!empty($_POST)){ //si le formulaire est vide ne rien faire
    extract($_POST); //extrait les valeurs du form en 4 variables $username $email $password $confpassword


    $ok = true;
 
    if (isset($_POST['inscription'])){ //test pour le formulaire "inscription"

      //htmlentites = pour éviter les injections, trim = enleve les espaces au début et a la fin
      $username = htmlentities(trim($username)); 
      $email = htmlentities(strtolower(trim($email))); 
      $password = trim($_POST['password']); 
      $confpassword = trim($confpassword); 
 
      // Verif username
      if(empty($username)){
        $ok = false;
        $er_username = ("Le username est vide");
      }
      else{

        //Verif que le username existe pas déjà
		$stmt = Model::getPDO()->prepare("SELECT * FROM p__user WHERE username=:username");
		$stmt->execute(['username' => $username]); 
		$req_username = $stmt->fetch();
		if ($req_username) {
			$ok = false;
			$er_username = "Ce username existe déjà";
        } 
    }

      // Verif email
      if(empty($email)){
        $ok = false;
        $er_mail = "L'email est vide";
 
       //on verif que le mail est dans un format mail
      }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)){
        $ok = false;
        $er_email = "L'email est invalide";

      }else{
      		
        //On check dans la base de donnée si le mail existe déjà
		$stmt = Model::getPDO()->prepare("SELECT * FROM p__user WHERE email=?");
		$stmt->execute([$email]); 
		$req_email = $stmt->fetch();
		if ($req_email) {
			$ok = false;
			$er_email = "Ce mail existe déjà";
        } 
    }

      // Verif du mot de passe
      if(empty($password)) {
        $ok = false;
        $er_password = "Le mot de passe est vide";

 	  //verif que la confirmation du mp est valide
      }elseif($password != $confpassword){
        $ok = false;
        $er_password = "Les deux mots de passe ne correspondent pas";
      

      }elseif(strlen($password)<6){
        $ok = false;
        $er_password = "Le mot de passe doit faire au minimum 6 caractères.";
      
      }
 
      //on execute la requete sql si toutes les conditions sont valides
      if($ok){
        $nonce = generateRandomHex();
        $options = ['cost' => 12];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);; //cryptage du password

        $req = Model::getPDO()->prepare("INSERT INTO p__user (username, email, password, nonce) VALUES (:username, :email,:password,:nonce)");
        $req->execute(array(
          'username' => $username, 
          'password' => $password, 
          'email' => $email,
          'nonce' => $nonce
        ));

        $mail = "https://webinfo.iutmontp.univ-montp2.fr/~mallekr/Projet-PHP/src/index.php?controller=user&action=validate&username=$username&nonce=$nonce";

        $header = "From: Hack-King <mallekrayane0@gmail.com>\n";
        $header .= "MIME-version: 1.0\n";
        $header .= "Content-type: text/html; charset=utf-8\n";
        $header .= "Content-Transfer-ncoding: 8bit";

        mail($email, 'Confirmation de compte', $mail, $header);
      
        header('Location: ./index.php?controller=user&action=login'); //redirection vers la page
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
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/vanilla-zoom.min.css">
</head>

<body>
    <section class="full_box_register">
        <div class="container_form_reg">
            <div class="block-heading">
                <h2 class="text-info"><strong>Create your Account</strong></h2>
            </div>
            <p>Register<br></p>
            <form method="post" class="register_form">
                <?php
                if (isset($er_username)){
                ?>
                  <div><?= $er_username ?></div>
                <?php 
                }
              ?>
                <div class="mb-3"><label class="form-label" for="username" style="color: white; font-family: TommyTHIN, Arial; margin-bottom: 0; margin-top: 1rem;"><strong>Username</strong><br></label>
                  <input class="form-control item" type="text" id="username" minlength="3" maxlength="40" type="text" placeholder="Username" name="username" value="<?php if(isset($username)){ echo $username; }?>" id="username">

                  <?php
                    if (isset($er_email)){
                    ?>
                      <div><?= $er_email ?></div>
                    <?php 
                    }
                  ?>
                  <label class="form-label" for="email" style="color: white; font-family: TommyTHIN, Arial; margin-bottom: 0; margin-top: 1rem;"><strong>Email</strong><br></label>
                  <input class="form-control" type="email" placeholder=" email" name="email" value="<?php if(isset($email)){ echo $email; }?>" id="email"></div>
                              <?php
                              if (isset($er_password)){
                              ?>
                                <div><?= $er_password ?></div>
                              <?php 
                              }
                            ?>
                <div class="mb-3"><label class="form-label" for="password" style="color: white; font-family: TommyTHIN, Arial; margin-bottom: 0; margin-top: 1rem;"><strong>Password</strong><br></label>

                  <input class="form-control" type="password" placeholder="Password" name="password" id="password" minlength="6" maxlength="50" required>

                  <label class="form-label" for="password" style="color: white; font-family: TommyTHIN, Arial; margin-bottom: 0; margin-top: 1rem;"><strong>Confirm Password</strong><br></label>

                  <input class="form-control" type="password" placeholder="Confirm Password" name="confpassword" id="confpassword" required></div>

                <div class="mb-3"></div><button class="btn btn-primary text-center" type="submit" name="inscription">S'inscrire</button>
                <div></div><h1 style="font-family: TommyTHIN, Arial; color: white;">You already have an account? <a href="index.php?action=login">Login</a></h1>
            </form>
        </div>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/vanilla-zoom.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>
</html>
