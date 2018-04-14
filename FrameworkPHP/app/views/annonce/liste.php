<?php include(VIEW_PATH . 'default/nav.php'); ?>
<div class="row">
    <h1>Voici les résultats de votre recherche</h1>
</div>
<?php
if(isset($error)){
   echo "<div class='alert alert-info' role='alert'>$error</div>";
}elseif(isset($produits)){
    foreach ($produits as $produit) { ?>
<form action="<?php echo Route::get_uri('ContactController@index') ?>" method="post">

<div class="container rounded">
    <div class="row">
        <div class="col-md-2">
            <img src="<?php echo PUBLIC_URI."img/".$produit->proImg ?>" alt="" class="rounded-circle" width="150px" height="150px">
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
            <input type="hidden" name="id" value="<?php echo $produit->id_produit ?>">
            <button type="submit" class="btn btn-success">Echanger</button>
        </div>
    </div>
</div>

</form>
<br>
        <?php
    }
}
?>
<?php include(VIEW_PATH . 'default/footer.php'); ?>