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
            <img class="product" src="<?php echo ASSET_URL . 'img/' . $produit->proImg ?>" alt="">
        </div>
        <div class="col-md-3">
            <div class="col-md-12">
                Vendeur : <?php echo $produit->utiPseudo ?>
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
            <a href="<?php echo $this->view('/contact/' . $produit->id_produit); ?>"><button class="btn btn-success">Echanger</button></a>
        </div>
    </div>
</div>

        <?php
    }
}
?>
<?php include(VIEW_PATH . 'default/footer.php'); ?>