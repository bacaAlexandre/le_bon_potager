<?php include(VIEW_PATH.'default/navAdmin.php'); ?>
<div class="row">
  <h1>Gestion des utilisateurs</h1>
</div>
<div class="row main">
  <div class="col-md-12 md-12">
    <div class="card">
      <div class="card-header">ID : <?php $id_user = "1"; echo $id_user; ?></div>
      <div class="card-body">
        <div><p class="card-text">Utilisateur : Panda Roux</div>
      </div>
      <div class="card-footer text-right">
        <form action="" method="post" class="">
          <a href="/admin/utilisateur/1/edit"><button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button></a>
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
<?php include(VIEW_PATH . 'default/footer.php'); ?>