<?php include(VIEW_PATH.'default/nav.php'); ?>

<div class="row">
  <h1>Déposez votre annonce</h1>
</div>
<?php if ($this->flash('success_creation') !== null) { ?>
    <div class="col-12 alert alert-success">
        <p><?php echo $this->flash('success_creation'); ?></p>
    </div>
<?php } ?>
<form action="<?php echo $this->view('/potager/store') ?>" method="post">
  <fieldset>
    <legend>Déposez votre annonce</legend>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="product">Produit :</label>
            <select name="product" id="product" class="form-control">
              <option disabled <?php echo ($this->flash('produit_creation') === null ? 'selected' : '') ?>>--</option>
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
          <div class="form-group">
            <label for="quantity">Quantitée :</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="<?php echo $this->flash('quantite_creation'); ?>" required>
          </div>
          <div class="form-group">
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
          <div class="form-group">
              <label for="info">Information :</label>
              <textarea rows="5" name="info" id="info" class="form-control" placeholder="Saisir des informations supplémentaires sur le produit."></textarea>
          </div>
        </div>
      </div>
        <div class="col-md-12">
            <button type="submit" name="search" class="btn btn-success">Valider</button>
        </div>
      <?php if ($this->flash('error_creation') !== null) { ?>
          <ul class='alert alert-danger' role='alert'>
              <?php foreach ($this->flash('error_creation') as $error) {
                  echo "<li>$error</li>";
              } ?>
          </ul>
      <?php } ?>
  </fieldset>
</form>
<div class="row">
  <h1>Vos annonces actives</h1>
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>