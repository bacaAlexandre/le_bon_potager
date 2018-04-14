<?php include(VIEW_PATH.'default/navAdmin.php'); ?>
<div class="row">
  <h1>Gestion des annonces</h1>
</div>
<div class="row main">
  <div class="col-md-12 md-12">
    <div class="card">
        <!-- Début : à modifier -->
      <div class="card-header">Annonce ID : <?php echo $id_annonce; ?></div>
      <div class="card-body">
        <div class="inline"><p class="card-text">Produit : <?php echo $name_product; ?></div>
        <div class="inline"><p class="card-text">Utilisateur : <?php echo $name_utilisateur; ?></div>
        <!-- Fin : à modifier -->
      </div>
      <div class="card-footer text-right">
        <!-- Début : à modifier -->
        <a href="<?php echo Route::get_uri('AdminUtilisateurController@edit', array('id' => $user->id_utilisateur))?>"><button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button></a>
        <a href="<?php echo Route::get_uri('AdminUtilisateurController@lock', array('id' => $user->id_utilisateur))?>"><button type="submit" value="lock" class="btn btn-danger"><i class="fa <?php echo ($user->utiDesactive ? 'fa-unlock' : 'fa-lock')?>"></i></button></a>
        <!-- Fin : à modifier -->
      </div>
    </div>
  </div>
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>