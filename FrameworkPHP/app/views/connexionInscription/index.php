<?php include(VIEW_PATH.'default/header.php'); ?>
<div class="row">
  <h1>Inscrivez-vous pour nous rejoindre !</h1>
</div>
<div class="row">
  <div class="col-md-5">
    <form action="<?php Route::get_uri('ConnexionInscriptionController@connexion') ?>" method="post">
      <fieldset>
          <legend>Connexion</legend>
          <div class="form-group">
              <label for="email_con">Votre e-mail :</label>
              <input type="email" name="email" id="email_con" class="form-control" value="<?php echo isset($email_connexion)? $email_connexion : ""; ?>" required>
          </div>
          <div class="form-group">
              <label for="password_con">Votre mot de passe :</label>
              <input type="password" name="password" id="password_con" class="form-control" minlength="8" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$" required>
          </div>
          <button type="submit" class="btn btn-sucess">Se connecter</button>
          <?php echo (isset($error_connexion)? $error_connexion : "") ?>
      </fieldset>
    </form>
  </div>
    <hr class="hr_con" />
  <hr class="hr_con" />
  <div class="col-md-6">
    <form action="<?php echo Route::get_uri('ConnexionInscriptionController@inscription') ?>" method="post">
      <fieldset>
        <legend>Inscription</legend>
        <div class="form-group">
          <label for="email">Votre e-mail* :</label>
          <input type="email" name="email" id="email" class="form-control" value="<?php echo isset($email_registration) ? $email_registration : ""; ?>" required>
        </div>
        <div class="form-group">
          <label for="password">Votre mot de passe* :</label>
          <input type="password" name="password" id="password" class="form-control" minlength="8" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$" required>
        </div>
        <div class="form-group">
          <label for="password_repeat">Confirmer votre mot de passe* :</label>
          <input type="password" name="password_repeat" id="password_repeat" class="form-control" minlength="8" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$" required>
        </div>
        <div class="form-group">
          <label for="pseudo">Votre pseudonyme* :</label>
          <input type="text" name="pseudo" id="pseudo" class="form-control" minlength="3" maxlength="30" value="<?php echo isset($pseudo) ? $pseudo : ""; ?>" required>
        </div>
        <div class="form-group">
          <label for="address">Votre adresse* :</label>
          <textarea rows="3" name="address" id="address" class="form-control" required><?php echo isset($address) ? $address : ""; ?></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="postalcode">Votre code postal * :</label>
            <select name="postalcode" id="postalcode" class="form-control" required>
              <option selected disabled>--</option>
              <?php
              if(isset($postalCode)) {
                foreach ($postalCode as $val) {
                  echo "<option value=\"".$val->id_codePostal."\">".$val->cpLibelle."</option>";
                }
              }
              ?>
            </select>
          </div>
          <div class="form-group col-md-8">
            <label for="city">Votre ville * :</label>
            <select name="city" id="city" class="form-control" required>
              <option selected disabled>--</option>
              <?php
              if(isset($city)) {
                foreach ($city as $val) {
                  echo "<option value=\"".$val->id_ville."\">".$val->vilLibelle."</option>";
                }
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="dep">Votre département *:</label>
          <select name="dep" id="dep" class="form-control" required>
            <option selected disabled>--</option>
            <?php
            if(isset($department)){
                foreach ($department as $val){
                    echo "<option value=\"".$val->id_departement."\">".$val->depLibelle."</option>";
                }
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="phone">Votre n° de téléphone :</label>
          <input type="tel" name="phone" id="phone" class="form-control" value="<?php echo isset($phone) ? $phone : ""; ?>">
        </div>
        <div class="form-group">
          <label for="biography">Votre biographie :</label>
          <textarea rows="5" name="biography" id="biography" class="form-control"><?php echo isset($biography) ? $biography : ""; ?></textarea>
        </div>
        <div class="form-check">
          <input type="checkbox" id="address_visible" class="form-check-input" >&nbsp;
          <label for="address_visible" class="form-check-label">J'autorise l'affichage de mon adresse dans mes annonces.</label>
        </div>
        <div class="form-check">
          <input type="checkbox" id="tel_visible" class="form-check-input" >&nbsp;
          <label for="tel_visible" class="form-check-label">J'autorise l'affichage de mon n° de tél. dans mes annonces.</label>
        </div>
        <p>* Champs obligatoires</p>
        <button type="submit" class="btn btn-success">Inscription</button>
        <?php echo isset($error_registration) ? $error_registration : ""; ?>
      </fieldset>
    </form>
  </div>
</div>
<?php include(VIEW_PATH.'default/footer.php'); ?>

