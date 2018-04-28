<?php include(VIEW_PATH.'default/navAdmin.php'); ?>
<div class="row">
  <h1>Gestion des produits</h1>
</div>
<div class="row">
  <div class="col-md-4 md-4">
    <div class="card" style="width: 18rem;">
      <div class="card-header">Tomate</div>
      <img class="card-img-top product_panel" src="<?php echo ASSET_URL . 'img/tomate.png' ?>" alt="Tomate">
      <div class="card-body">
          <div><p class="card-text">La tomate est un fruit.</p></div>
      </div>
      <div class="card-footer text-right">
        <a href=""><button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button></a>
          <a href=""><button type="button" value="lock" class="btn btn-danger"><i class="fa fa-lock"></i></button></a>
      </div>
    </div>
  </div>
  <div class="col-md-4 md-4">
    <div class="card" style="width: 18rem;">
      <div class="card-header">Haricot vert</div>
      <img class="card-img-top product_panel" src="<?php echo ASSET_URL . 'img/haricot_vert.jpg' ?>" alt="Haricot vert">
      <div class="card-body">
          <div><p class="card-text">Le haricot vert est un légume disponible toute l’année.</p></div>
      </div>
      <div class="card-footer text-right">
          <a href=""><button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button></a>
          <a href=""><button type="button" value="lock" class="btn btn-danger"><i class="fa fa-lock"></i></button></a>
      </div>
    </div>
  </div>
  <div class="col-md-4 md-4">
    <div class="card" style="width: 18rem;">
      <div class="card-header">Radis</div>
      <img class="card-img-top product_panel" src="<?php echo ASSET_URL . 'img/radis.jpg' ?>" alt="Radis">
      <div class="card-footer text-right">
          <a href=""><button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button></a>
          <a href=""><button type="button" value="lock" class="btn btn-danger"><i class="fa fa-lock"></i></button></a>
      </div>
    </div>
  </div>
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>