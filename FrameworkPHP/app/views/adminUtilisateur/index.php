<?php include(VIEW_PATH.'default/navAdmin.php'); ?>
<div class="row">
  <h1>Gestion des utilisateurs</h1>
</div>
<div class="row main">
  <div class="col-md-12 md-12">
    <div class="card">
      <div class="card-header">ID : <?php $user->utiId; ?></div>
      <div class="card-body">
        <div><p class="card-text">Utilisateur : <?php echo $user->utiPseudo; ?></div>
      </div>
      <div class="card-footer text-right">
        <a href="<?php echo Route::get_uri('AdminUtilisateurController@edit', array('id' => $user->id_utilisateur))?>"><button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button></a>
        <a href="<?php echo Route::get_uri('AdminUtilisateurController@lock', array('id' => $user->id_utilisateur))?>"><button type="submit" value="lock" class="btn btn-danger"><i class="fa <?php echo ($user->utiDesactive ? 'fa-unlock' : 'fa-lock')?>"></i></button></a>
      </div>
    </div>
  </div>
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>