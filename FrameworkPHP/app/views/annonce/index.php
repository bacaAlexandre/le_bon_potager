<?php include(VIEW_PATH.'default/nav.php'); ?>
<div class="row rounded">
  <h1>Inscrivez-vous pour nous rejoindre !</h1>
</div>
<br>
<div class="row rounded-top">
  <div class="col-md-12">
    <form action="<?php Route::get_uri('') ?>" method="post">
      <fieldset>
        <legend>Confectionnez votre panier maraîcher</legend>
        <div class="form-row">
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
          <div class="form col-md-5 md-5">
            <select name="dep" class="form-control">
              <option disabled selected>Département</option>
              <option value="1">Choix 1</option>
              <option value="2">Choix 2</option>
              <option value="3">Choix 3</option>
            </select>
          </div>
          <div class="form col-md-2 md-2">
            <button type="submit" name="search" class="btn btn-success">Rechercher</button>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<div class="row rounded-bottom main">
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>