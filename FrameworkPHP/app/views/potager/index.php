<?php include(VIEW_PATH.'default/nav.php'); ?>
<div class="row">
    <h1>Déposez votre annonce</h1>
</div>
<br>
<div class="row">
  <div class="col-md-6">
    <form action="<?php Route::get_uri('') ?>" method="post">
      <fieldset>
        <legend>Déposez votre annonce</legend>
        <div class="form">
          <div class="form col-md-5 md-5">
            <select name="product" class="form-control">
              <option disabled selected>Produit</option>
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
          <div class="row">
            <div class="form-group">
              <label for="quantity">Quantitée :</label>
              <input type="text" name="quantity" id="quantity" class="form-control" value="" required>
            </div>
            <div class="col-md-2">
              <div class="form-check">
                <input type="radio" id="unity_kg" name="unity" value="kg" class="form-check-input" checked>&nbsp;
                <label for="unity_kg" class="form-check-label">Kg</label>
              </div>
              <div class="form-check">
                <input type="radio" id="unity_p" name="unity" value="p" class="form-check-input">&nbsp;
                <label for="unity_p" class="form-check-label">Pièce</label>
              </div>
            </div>
          </div>
          <div class="form col-md-2 md-2">
            <button type="submit" name="search" class="btn btn-success">Valider</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="biography"></label>
      <textarea rows="5" name="biography" id="biography" class="form-control" placeholder="Saisir votre commentaire"></textarea>
    </div>
  </div>
</div>
<div class="row rounded-bottom main">
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>