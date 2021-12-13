<?php

require_once './PHP/config/Conf.php';

$bdd = new PDO('webinfo', 'mallekr', 'mallekr', "mallekr");
 
if(isset($_GET['username'], $_GET['key']) AND !empty($_GET['username']) AND !empty($_GET['key'])) {
   $pseudo = htmlspecialchars(urldecode($_GET['username']));
   $key = htmlspecialchars($_GET['key']);
   $requser = $bdd->prepare("SELECT * FROM p__user WHERE username = :username AND confirmkey = :key");
   $requser->execute(array($username, $key));
   $userexist = $requser->rowCount();
   if($userexist == 1) {
      $user = $requser->fetch();
      if($user['confirm'] == 0) {
         $updateuser = $bdd->prepare("UPDATE p__user SET confirme = 1 WHERE username = :username AND confirmkey = key");
         $updateuser->execute(array($username,$key));
         echo "Votre compte a bien été confirmé !";
      } else {
         echo "Votre compte a déjà été confirmé !";
      }
   } else {
      echo "L'utilisateur n'existe pas !";
   }
}
?>