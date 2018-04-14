<?php include(VIEW_PATH.'default/navAdmin.php'); ?>
<div class="row">
  <h1>Liste de membres</h1>
</div>
<div class="row">
  <div class="col-md-12 md-12">
    <div class="card">
      <div class="card-header">Panda Roux</div>
      <div class="card-body">
          <div><p class="card-text">Nombre de transactions éffectuer : 20 achats 4 livraisons</p></div>
      </div>
      <div class="card-footer text-right">
        <form action="" method="post">
          <button type="submit" value="edit" class="btn btn-warning"><i class="fas fa-wrench"></i></button>
          <button type="submit" value="lock" class="btn btn-danger">
            <!-- Si l'utilisateur n'est pas verrouiller afficher -->
            <i class="fa fa-lock"></i>
            <!-- Si l'utilisateur est verrouiller afficher -->
            <i class="fa fa-unlock"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row main">
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>