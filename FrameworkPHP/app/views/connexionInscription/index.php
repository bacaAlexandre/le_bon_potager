<?php include(VIEW_PATH.'default/header.php'); ?>
<div class="row">
  <form action="/verification.php" method="post">
    <div class="col-md-6 md-6">
      <fieldset>
        <legend>Connexion</legend>
        <div class="form-group">
          <label for="email_con">Votre e-mail :</label>
          <input type="email" name="email" id="email_con" class="form-control">
        </div>
        <div class="form-group">
          <label for="password_con">Votre mot de passe :</label>
          <input type="password" name="password" id="password_con" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
      </fieldset>
    </div>
  </form>
  <form action="/verification.php" method="post">
    <div class="col-md-6 md-6">
      <fieldset>
        <legend>Inscription</legend>
        <div class="form-group">
          <label for="email">Votre e-mail :</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Votre mot de passe :</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="password_repeat">Confirmation de votre mot de passe :</label>
          <input type="password_repeat" name="password_repeat" id="password_repeat" class="form-control">
        </div>
        <div class="form-group">
          <label for="pseudo">Votre pseudonyme :</label>
          <input type="pseudo" name="pseudo" id="pseudo" class="form-control">
        </div>
        <div class="form-group">
          <label for="address">Rue :</label>
          <textarea rows="5" id="address" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="postal_code">Votre code postal :</label>
          <input type="postal_code" name="postal_code" id="postal_code" class="form-control">
        </div>
        <div class="form-group">
          <label for="city">Votre ville :</label>
          <input type="city" name="city" id="city" class="form-control">
        </div>
        <div class="form-group">
          <label for="phone">Votre n° de téléphone :</label>
          <input type="tel" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
          <label for="biography">Votre biographie :</label>
          <textarea rows="5" id="biography" class="form-control"></textarea>
        </div>
        <div class="form-check">
          <input type="checkbox" id="copy" class="form-check-input">
          <label for="copy" class="form-check-label">Je souhaite recevoir une copie de cet email</label>
        </div>
        <div class="form-check">
          <input type="checkbox" id="copy" class="form-check-input">
          <label for="copy" class="form-check-label">Je souhaite recevoir une copie de cet email</label>
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
      </fieldset>
    </div>
  </form>
</div>
<?php include(VIEW_PATH.'default/footer.php'); ?>
