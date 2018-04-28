<?php include(VIEW_PATH.'default/navAdmin.php'); ?>
<div class="row">
  <h1>Gestion de l'utilisateur</h1>
</div>
<?php if ($this->flash('success_change_infos') !== null) { ?>
    <div class="col-12 alert alert-success">
        <p><?php echo $this->flash('success_change_infos'); ?></p>
    </div>
<?php } ?>
<?php if ($this->flash('success_change_password') !== null) { ?>
    <div class="col-12 alert alert-success">
        <p><?php echo $this->flash('success_change_password'); ?></p>
    </div>
<?php } ?>
<form action="<?php echo $this->view('/admin/utilisateur/' . $id_utilisateur . '/changeinfos') ?>" method="post">
  <fieldset>
    <legend>Informations</legend>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="address">Son adresse :</label>
          <textarea rows="2" name="address" id="address" class="form-control" placeholder="Saisir votre adresse." required><?php echo $adresse; ?></textarea>
        </div>
        <div class="form-check">
          <input type="checkbox" id="address_visible" name="adresse_affiche" class="form-check-input" <?php echo ($adresse_affiche ? 'checked' : ''); ?>>&nbsp;
          <label for="address_visible" class="form-check-label">J'autorise l'affichage de son adresse dans ses annonces.</label>
        </div>
        <div class="form-group">
            <label for="postal_code">Son code postal :</label>
            <select name="postal_code" id="postal_code" class="form-control" required>
              <!-- Début : à modifier -->
                <option disabled <?php echo ($code_postal === null) ? 'selected' : ''; ?>>--</option>
                <?php foreach ($postal_code as $val) {
                    if ($code_postal == $val->id_code_postal) {
                        echo "<option value=\"" . $val->id_code_postal . "\" selected>" . $val->cpLibelle . "</option>";
                    } else {
                        echo "<option value=\"" . $val->id_code_postal . "\">" . $val->cpLibelle . "</option>";
                    }
                } ?>
              <!-- Fin : à modifier -->
            </select>
        </div>
        <div class="form-group">
          <label for="tel">Son téléphone :</label>
          <input type="tel" name="tel" id="tel" class="form-control" value="<?php echo $phone ?>" minlength="10" maxlength="10">
        </div>
        <div class="form-check">
          <input type="checkbox" id="tel_visible" name="tel_affiche" class="form-check-input" <?php echo ($tel_affiche ? 'checked' : ''); ?>>&nbsp;
          <label for="tel_visible" class="form-check-label">J'autorise l'affichage de son n° de tél. dans ses annonces.</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="pseudo">Son pseudonyme :</label>
          <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php echo $pseudo ?>">
        </div>
        <div class="form-group">
          <label for="email">Son email actuel :</label>
          <input type="text" name="email" id="email" class="form-control" value="<?php echo $email ?>">
        </div>
        <div class="form-group">
          <label for="biography">Sa biographie :</label>
          <textarea rows="5" name="biography" id="biography" class="form-control" placeholder="Faire une description concernant ses produits."><?php echo $description; ?></textarea>
        </div>
      </div>

    </div>
  </fieldset>
  <div class="row">
    <div class="col-md-12">
        <input type="hidden" name="id_utilisateur" value="<?php echo $id_utilisateur ?>">
      <button type="submit" name="change_info" class="btn btn-success">Modifier</button>
    </div>
  </div>
    <?php if ($this->flash('error_change_infos') !== null) { ?>
        <ul class='alert alert-danger' role='alert'>
            <?php foreach ($this->flash('error_change_infos') as $error) {
                echo "<li>$error</li>";
            } ?>
        </ul>
    <?php } ?>
</form>
<hr>
<form action="<?php echo $this->view('/admin/utilisateur/' . $id_utilisateur . '/changemdp') ?>" method="post">
  <fieldset>
    <legend>Mot de passe</legend>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="password">Son nouveau mot de passe :</label>
          <input type="password" name="password" id="password" class="form-control" minlength="8">
        </div>
      </div>
    </div>
  </fieldset>
  <div class="row">
    <div class="col-md-12">
        <input type="hidden" name="id_utilisateur" value="<?php echo $id_utilisateur ?>">
      <button type="submit" name="change_password" class="btn btn-success">Modifier</button>
    </div>
  </div>
  <?php if ($this->flash('error_change_password') !== null) { ?>
      <ul class='alert alert-danger' role='alert'>
          <?php foreach ($this->flash('error_change_password') as $error) {
              echo "<li>$error</li>";
          } ?>
      </ul>
  <?php } ?>
</form>
<?php include(VIEW_PATH . 'default/footer.php'); ?>