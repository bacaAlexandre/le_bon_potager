<?php include(VIEW_PATH.'default/nav.php'); ?>
<div class="row">
  <h1>Déposez votre annonce</h1>
</div>
<br>
<form action="<?php Route::get_uri('') ?>" method="post">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="product">Produit :</label>
        <select name="product" id="product" class="form-control">
          <option disabled selected>--</option>
          <optgroup label="Fruits">
            <option value="fruit_1">Fruit 1</option>
            <option value="fruit_2">Fruit 2</option>
            <option value="fruit_3">Fruit 3</option>
            <option value="fruit_4">Fruit 4</option>
            <option value="fruit_5">Fruit 5</option>
          </optgroup>
          <optgroup label="Légumes">
            <option value="vegetable_1">Légume 1</option>
            <option value="vegetable_2">Légume 2</option>
            <option value="vegetable_3">Légume 3</option>
            <option value="vegetable_4">Légume 4</option>
            <option value="vegetable_5">Légume 5</option>
          </optgroup>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="quantity">Quantitée :</label>
        <input type="text" name="quantity" id="quantity" class="form-control" value="" required>
      </div>
      <div class="col-md-2">
        <div class="form-check">
          <input type="radio" id="unity_kg" name="unity" value="kg" class="form-check-input" checked>&nbsp;
          <label for="unity_kg" class="form-check-label">Kg</label>
        </div>
        <div class="form-check">
          <input type="radio" id="unity_g" name="unity" value="g" class="form-check-input">&nbsp;
          <label for="unity_g" class="form-check-label">g</label>
        </div>
        <div class="form-check">
          <input type="radio" id="unity_p" name="unity" value="p" class="form-check-input">&nbsp;
          <label for="unity_p" class="form-check-label">Pièce</label>
        </div>
      </div>
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
  </form>
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>