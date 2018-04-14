<?php include(VIEW_PATH . 'default/nav.php'); ?>
<div class="row">
    <h1>Voici les résultats de votre recherche</h1>
</div>
<?php
if(isset($error)){
   echo "<div class='alert alert-info' role='alert'>$error</div>";
}elseif(isset($produits)){
    foreach ($produits as $produit) { ?>

<div class="container rounded">
    <div class="row">
        <div class="col-md-2">
            <img src="<?php echo PUBLIC_URI."img/".$produit->proImg ?>" alt="" class="product">
        </div>
        <div class="col-md-3">
            <div class="col-md-12">
                Vendeur : <?php echo $produit->utipseudo ?>
            </div>    
            <div class="col-md-12">
                Produit : <?php echo $produit->proNom ?>
            </div>
            <div class="col-md-12">
                Quantité: <?php echo $produit->puQuantite . " " . $produit->uniLibelle ?>
            </div>
        </div>
        <div class="col-md-7">
            <p><?php echo $produit->puCommentaire ?></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo Route::get_uri('ContactController@index', array('id' => $produit->id_produit)); ?>"><button class="btn btn-success">Echanger</button></a>
        </div>
    </div>
</div>

        <?php
    }
}
?>
<?php include(VIEW_PATH . 'default/footer.php'); ?>