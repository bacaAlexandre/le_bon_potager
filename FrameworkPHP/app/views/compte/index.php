<?php include(VIEW_PATH.'default/nav.php'); ?>
<div class="row">
    <h1>Mon compte</h1>
</div>
<form action="<?php Route::get_uri('') ?>" method="post">
  <fieldset>
    <legend>Informations</legend>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="address">Votre adresse :</label>
          <textarea rows="2" name="address" id="address" class="form-control" placeholder="Saisir votre adresse." required></textarea>
        </div>
        <div class="form-check">
          <input type="checkbox" id="address_visible" class="form-check-input" checked>&nbsp;
          <label for="address_visible" class="form-check-label">J'autorise l'affichage de mon adresse dans mes annonces.</label>
        </div>
        <div class="form-group">
          <label for="postalcode">Votre code postal :</label>
          <input type="number" name="postalcode" id="postalcode" class="form-control" value="<?php echo $postalcode; ?>" minlength="5" maxlength="5" required>
        </div>
        <div class="form-group">
          <label for="tel">Votre téléphone :</label>
          <input type="tel" name="tel" id="tel" class="form-control" value="<?php echo $phone; ?>" minlength="10" maxlength="10" required>
        </div>
        <div class="form-check">
          <input type="checkbox" id="tel_visible" class="form-check-input" checked>&nbsp;
          <label for="tel_visible" class="form-check-label">J'autorise l'affichage de mon n° de tél. dans mes annonces.</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="pseudo">Votre pseudonyme :</label>
          <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php echo $pseudo; ?>">
        </div>
        <div class="form-group">
          <label for="biography">Votre biographie :</label>
          <textarea rows="5" name="biography" id="biography" class="form-control" placeholder="Faire une description concernant vos produits."></textarea>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="row">
    <div class="col-md-12">
      <button type="submit" name="change_info" class="btn btn-success">Modifier</button>
    </div>
  </div>
</form>
<hr>
<form action="<?php Route::get_uri('') ?>" method="post">
  <fieldset>
    <legend>Mot de passe</legend>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="password_old">Votre mot de passe actuel :</label>
          <input type="password" name="password_old" id="password_old" class="form-control" value="<?php echo $phone; ?>" minlength="10" maxlength="10">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="password_new">Votre nouveau mot de passe :</label>
          <input type="password" name="password_new" id="password_new" class="form-control" value="<?php echo $phone; ?>" minlength="10" maxlength="10">
        </div>
        <div class="form-group">
          <label for="password_new">Confirmez votre nouveau mot de passe :</label>
          <input type="password" name="password_new" id="password_new" class="form-control" value="<?php echo $phone; ?>" minlength="10" maxlength="10">
        </div>
      </div>
    </div>
  </fieldset>
  <div class="row">
    <div class="col-md-12">
      <button type="submit" name="change_password" class="btn btn-success">Modifier</button>
    </div>
  </div>
</form>
<?php include(VIEW_PATH . 'default/footer.php'); ?>