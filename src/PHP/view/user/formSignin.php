<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- <title>page index</title> -->
    <link rel="stylesheet" href="../../../CSS/form.css" media="screen" type="text/css" />
</head>
<body>


<h3>Formulaire d'inscription</h3>
<form method="post" action="">
    <label id="pres">Créer votre Compte</label><br><br>
    <div class="nom_pre">
        <input type="text" name="nom" id="nom" placeholder="Votre Nom" required/><br>
        <input type="text" name="prenom" id="prenom" placeholder="Votre Prénom" required/><br>
    </div>
    <input type="email" name="semail" id="semail" placeholder="Votre Email" required> <br>
    <input type="password" name="password" id="password" placeholder="Votre Mot de passe" required> <br>
    <input type="password" name="cpassword" id="cpassword" placeholder="Confirmez votre Mot de passe" required> <br>
    <input type="submit" name="formsend" id="formsend" value="S'inscrire">
</form>