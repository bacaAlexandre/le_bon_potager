<?php include(VIEW_PATH . 'default/navAdmin.php');
?>
    <div class="row">
        <h1>Gestion des produits</h1>
    </div>
    <div class="row">
        <?php foreach($produits as $produit) { ?>
            <div class="col-md-4 md-4">
                <div class="card">
                    <div class="card-header"><?php echo $produit->proNom; ?></div>
                    <img class="card-img-top product_panel" src="<?php echo ASSET_URL .'img'.DS. $produit->proImg;?>">
                    <div class="card-body">
                        <div><p class="card-text"><?php echo $produit->proNom; ?></p></div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="">
                            <button type="button" class="btn btn-warning"><i class="fas fa-wrench"></i></button>
                        </a>
                        <a href="">
                            <button type="button" value="lock" class="btn btn-danger"><i class="fa fa-lock"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>