if ((isset($_SESSION['id']))){ //si une session existe déja (= utilisateur connecté) on redirige vers la page d'accueil
    header('Location: ../index.php');
    exit;
  }

if(!empty($_POST)){ //si le formulaire est vide ne rien faire
    extract($_POST); //extrait les valeurs du form en 4 variables $pseudo $email $mdp $confmdp


    $ok = true;
 
    if (isset($_POST['inscription'])){ //test pour le formulaire "inscription"

      //htmlentites = pour éviter les injections, trim = enleve les espaces au début et a la fin
      $pseudo = htmlentities(trim($pseudo)); 
      $email = htmlentities(strtolower(trim($email))); 
      $mdp = trim($mdp); 
      $confmdp = trim($confmdp); 
 
      // Verif pseudo
      if(empty($pseudo)){
        $ok = false;
        $er_pseudo = ("Le pseudo est vide");
      }
      else{

        //Verif que le pseudo existe pas déjà
		$stmt = $pdo->prepare("SELECT * FROM NDI__User WHERE pseudo=?");
		$stmt->execute([$pseudo]); 
		$req_pseudo = $stmt->fetch();
		if ($req_pseudo) {
			$ok = false;
			$er_pseudo = "Ce pseudo existe déjà";
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
		$stmt = $pdo->prepare("SELECT * FROM NDI__User WHERE email=?");
		$stmt->execute([$email]); 
		$req_email = $stmt->fetch();
		if ($req_email) {
			$ok = false;
			$er_email = "Ce mail existe déjà";
        } 
    }

      // Verif du mot de passe
      if(empty($mdp)) {
        $ok = false;
        $er_mdp = "Le mot de passe est vide";

 	  //verif que la confirmation du mp est valide
      }elseif($mdp != $confmdp){
        $ok = false;
        $er_mdp = "Les deux mots de passe ne correspondent pas";
      

      }elseif(strlen($mdp)<6){
        $ok = false;
        $er_mdp = "Le mot de passe doit faire au minimum 6 caractères.";
      
      }
 
      //on execute la requete sql si toutes les conditions sont valides
      if($ok){

        $mdp = crypt($mdp, '$6$rounds=5000$nuitexpressSauveteurExpress$'); //cryptage du mdp
        $datecreation = date('Y-m-d H:i:s');
        $token = bin2hex(random_bytes(12));

        $req = $pdo->prepare("INSERT INTO NDI__User
        SET pseudo = :pseudo, motdepasse = :motdepasse, email = :email, date_creation = :datecreation");
        $req->execute(array('pseudo' => $pseudo, 'motdepasse' => $mdp, 'email' => $email, 'datecreation' => $datecreation));


        
        

        

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
    <section class="clean-block clean-form dark" style="height: 830.188px;">
        <div class="container text-start" style="height: 459px;">
            <div class="block-heading" style="height: -5px;">
                <h2 class="text-info" style="text-align: center;"><strong>S'inscrire</strong></h2>
            </div>
            <p style="text-align: center;">Remplissez ce formulaire pour créer votre compte SauveteurExpress.<br></p>
            <form method="post">
                <?php
                if (isset($er_pseudo)){
                ?>
                  <div><?= $er_pseudo ?></div>
                <?php 
                }
              ?>
                <div class="mb-3"><label class="form-label" for="pseudo"><strong>Pseudo</strong><br></label>
                  <input class="form-control item" type="text" id="pseudo" minlength="3" maxlength="20" type="text" placeholder="Votre pseudo" name="pseudo" value="<?php if(isset($pseudo)){ echo $pseudo; }?>" id="pseudo">

                  <?php
                    if (isset($er_email)){
                    ?>
                      <div><?= $er_email ?></div>
                    <?php 
                    }
                  ?>
                  <label class="form-label" for="email"><strong>Adresse Email</strong><br></label>
                  <input class="form-control item" type="email" placeholder="Adresse email" name="email" value="<?php if(isset($email)){ echo $email; }?>" id="email"></div>
                              <?php
                              if (isset($er_mdp)){
                              ?>
                                <div><?= $er_mdp ?></div>
                              <?php 
                              }
                            ?>
                <div class="mb-3"><label class="form-label" for="password"><strong>Mot de passe</strong><br></label>

                  <input class="form-control" type="password" placeholder="Mot de passe" name="mdp" id="mdp" minlength="6" maxlength="50" required>

                  <label class="form-label" for="password"><strong>Confirmer le mot de passe</strong><br></label>

                  <input class="form-control" type="password" placeholder="Confirmer le mot de passe" name="confmdp" id="confmdp" required></div>

                <div class="mb-3" style="width: 435px;height: -65px;margin: 20px;padding: 0px;"></div><button class="btn btn-primary text-center" type="submit" name="inscription" style="background: rgb(12,36,97);border-radius: 13px;border-color: rgb(12,36,97);margin: 5px;height: 39px;padding: 7px 12px;transform: scale(1.13);font-size: 14px;font-weight: bold;width: 130.344px;">S'inscrire</button>
                <div></div><small>Vous avez déjà un compte ?&nbsp;<a href="index.php?action=login">Se connecter</a></small>
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
