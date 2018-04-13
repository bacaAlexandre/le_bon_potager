<?php include(VIEW_PATH.'default/nav.php'); ?>

<div class="row">
  <h1>Déposez votre annonce</h1>
</div>
<br>
<?php
    if ($this->flash('success_creation') !== null) {
        echo "<div class=\"row\">";
        echo "<div class=\"col-md-12 alert alert-success\">";
        echo "<p>".$this->flash('success_creation')."</p>";
        echo "</div>";
        echo "</div>";
    }
?>
<form action="<?php echo Route::get_uri('MonPotagerController@store') ?>" method="post">
  <fieldset>
    <legend>Déposez votre annonce</legend>
      <div class="row">
        <div class="col-md-6">
          <div class="form">
            <select name="product" class="form-control">
              <option disabled <?php echo ($this->flash('produit_creation') === null ? 'selected' : '') ?>>Produit</option>
                <?php
                foreach ($produits as $categorie => $data) {
                    echo "<optgroup label=\"$categorie\">";
                    foreach ($data as $produit) {
                        if ($this->flash('produit_creation') == $produit->id_produit) {
                            echo "<option value=\"$produit->id_produit\" selected>$produit->proNom</option>";
                        } else {
                            echo "<option value=\"$produit->id_produit\">$produit->proNom</option>";
                        }

                    }
                    echo "</optgroup>";
                }
                ?>
            </select>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="quantity">Quantitée :</label>
              <input type="text" name="quantity" id="quantity" class="form-control" value="<?php echo $this->flash('quantite_creation'); ?>" required>
            </div>
          </div>
            <div class="col-md-3">
                <?php foreach ($unites as $unite) {
                    echo "<div class=\"form-check-inline\">";
                    if ($this->flash('unite_creation') !== null) {
                        echo "<input type=\"radio\" id=\"unity_$unite->id_unite\" name=\"unity\" value=\"$unite->id_unite\" class=\"form-check-input\" checked>";
                    } else {
                        echo "<input type=\"radio\" id=\"unity_$unite->id_unite\" name=\"unity\" value=\"$unite->id_unite\" class=\"form-check-input\">";
                    }
                    echo "<label for=\"unity_$unite->id_unite\" class=\"form-check-label\">$unite->uniLibelle</label>";
                    echo "</div>";
                }?>
            </div>

        </div>
        <div class="col-md-6">
          <div class="form-group"
            <label for="info"></label>
            <textarea rows="5" name="info" id="info" class="form-control" placeholder="Saisir des informations supplémentaires sur le produit."><?php echo $this->flash('commentaire_creation'); ?></textarea>
          </div>
        </div>
        <div class="form-check">
          <input type="radio" id="unity_p" name="unity" value="p" class="form-check-input">&nbsp;
          <label for="unity_p" class="form-check-label">Pièce</label>
        </div>
      </div>
<<<<<<< HEAD
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="info">Information :</label>
        <textarea rows="5" name="info" id="info" class="form-control" placeholder="Saisir des informations supplémentaires sur le produit."></textarea>
      </div>
    </div>
    <div class="col-md-12">
      <button type="submit" name="search" class="btn btn-success">Valider</button>
    </div>
  </div>
</form>
<div class="row">
  <h1>Vos annonces actives</h1>
  <form action="<?php Route::get_uri('') ?>" method="post">
=======
      <?php if ($this->flash('error_creation') !== null) { ?>
          <ul class='alert alert-danger' role='alert'>
              <?php foreach ($this->flash('error_creation') as $error) {
                  echo "<li>$error</li>";
              } ?>
          </ul>
      <?php } ?>
    </fieldset>
>>>>>>> 92af60d080fc52df48c1f5d5e21fe6aa9c6deefd
  </form>
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>