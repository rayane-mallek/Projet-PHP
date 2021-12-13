<?php

    require_once './PHP/config/BDD.php';

  if ((isset($_SESSION['id']))){ //si une session existe déja (= utilisateur connecté) on redirige vers la page d'accueil
    header('Location: ./index.php');
    exit;
  }

  
  if(!empty($_POST)){ // Si la variable "$_Post" contient des informations alors on les traites
    extract($_POST); //extrait les valeurs du form en 2 variables $email $mdp
    
    $ok = true;


  if (isset($_POST['connexion'])){ //test pour le formulaire "inscription"

    //htmlentites = pour éviter les injections, trim = enleve les espaces au début et a la fin
    $email = htmlentities(strtolower(trim($email)));
    $mdp = trim($mdp);

    if(empty($email)){ //test si email est vide
      $ok = false;
      $er_email = "L'email est vide";
    }

    if(empty($mdp)){ //test si le mdp est vide
      $ok = false;
      $er_mdp = "Le mot de passe est vide";
    }
      
        
      

    $mdp= crypt($mdp, '$6$rounds=5000$nuitexpressSauveteurExpress$'); //on crypte le mdp avec la meme clé que pour l'inscription

    $req = $pdo->prepare("SELECT * FROM NDI__User WHERE email = :email AND motdepasse = :mdp"); 
    $req->execute(array('email' => $email, 'mdp' => $mdp));
    $resultat = $req->fetch();
    //on test si les valeurs du formulaire correspondent a la bdd

    if (!$resultat) { //si la requete échoue
      $ok = false;
      $er_email = "Le mail ou le mot de passe est incorrect";
    }

    if ($ok){
     //si tout est valide, alors on charge une session avec les attributs de la requete
      $_SESSION['id'] = $resultat['id']; 
      $_SESSION['pseudo'] = htmlentities($resultat['pseudo']); //htmlentities pour éviter les injections html/php
      $_SESSION['email'] = htmlentities($resultat['email']);
      $_SESSION['date'] = htmlentities($resultat['date_creation']);

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
    <title>Connexion</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="./assets/css/vanilla-zoom.min.css">
</head>

<body>
    <section class="clean-block clean-form dark" style="height: 830.188px;">
        <div class="container text-start" style="height: 459px;">
            <div class="block-heading" style="height: -5px;">
                <h2 class="text-info" style="text-align: center;"><strong>Se connecter</strong></h2>
            </div>
            <p style="text-align: center;">Connectez vous à votre compte SauveteurExpress<br></p>
            <form method="post">
              <?php
              if (isset($er_email)){ //si $er_mail n'est pas vide, alors on l'affiche
              ?>
                 <div><?= $er_email ?></div>
              <?php
                }
              ?>
                <div class="mb-3"><label class="form-label" for="email"><strong>Adresse Email</strong><br></label>
                  <input class="form-control item" type="email" id="email" placeholder="Adresse email" name="email" value="<?php if(isset($email)){ echo $email; }?>" required></div>
                  <?php
                  if (isset($er_mdp)){ //si $er_mdp n'est pas vide, alors on l'affiche
                  ?>
                    <div><?= $er_mdp ?></div>
                  <?php
                    }
                  ?>
                <div class="mb-3"><label class="form-label" for="password"><strong>Mot de passe <a href="./index.php?action=resetmdp">Mot de passe oublié</a></strong><br></label>
                  <input class="form-control" type="password" id="password" name="mdp"></div>
                <div class="mb-3" style="width: 435px;height: -65px;margin: 20px;padding: 0px;"></div><button class="btn btn-primary text-center" name="connexion" type="submit" style="background: rgb(12,36,97);border-radius: 13px;border-color: rgb(12,36,97);margin: 5px;height: 39px;padding: 7px 12px;transform: scale(1.13);font-size: 14px;font-weight: bold;width: 130.344px;">Se connecter</button>
                <div></div><small>Vous n'êtes pas encore inscrit ? <a href="./index.php?action=register">S'inscrire</a></small>
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
