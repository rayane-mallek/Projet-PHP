

<div class="div_form_prof">
  <h3>Your account</h3>
  <form method="post" class="profil_form">    
      <label class="form-label" for="email"><strong>Identifiant : <?= $_SESSION['id'] ?></strong></label>    
      <label class="form-label" for="email"><strong>Pseudo : <?= $_SESSION['username'] ?></strong></label>    
      <label class="form-label" for="email"><strong>Adresse Email : <?= $_SESSION['email'] ?></strong></label>
  </form>
</div>