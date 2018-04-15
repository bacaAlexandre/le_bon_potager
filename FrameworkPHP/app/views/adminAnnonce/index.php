<?php include(VIEW_PATH.'default/navAdmin.php'); ?>
<div class="row">
  <h1>Gestion des annonces</h1>
</div>

<?php foreach($annonces as $annonce) {?>
    <div class="row">
      <div class="col-md-12 md-12">
        <div class="card">
          <div class="card-header">ID : <?php echo $annonce->id_produit_utilisateur; ?></div>
          <div class="card-body">
            <div><p class="card-text">Produit : <?php echo $annonce->proNom; ?></p></div>
            <div><p class="card-text">Utilisateur : <?php echo $annonce->utiPseudo; ?></p></div>
          </div>
          <div class="card-footer text-right">
            <a href=""><button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button></a>
            <a href="<?php echo Route::get_uri('AdminAnnonceController@lock', array('id' => $annonce->id_produit_utilisateur)); ?>"><button class="btn btn-danger"><i class="fa <?php echo ($annonce->puDesactive ? 'fa-unlock' : 'fa-lock')?>"></i></button></a>
          </div>
        </div>
      </div>
    </div>
<?php } ?>
<?php include(VIEW_PATH . 'default/footer.php'); ?>