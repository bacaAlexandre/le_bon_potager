<?php include(VIEW_PATH . 'default/nav.php'); ?>
    <div class="row rounded">
        <h1>Voici les résultats de votre recherche :</h1>
    </div>

<?php
if(isset($error)){
   echo "<div class='alert alert-info' role='alert'>$error</div>";
}elseif(isset($produits)){
    foreach ($produits as $produit) { ?>
        <form action="<?php echo Route::get_uri('ContactController@index') ?>" method="post">
            <img src="<?php echo PUBLIC_URI."img/".$produit->proImg ?>" alt="">
            <p><?php echo $produit->utipseudo ?></p>
            <p><?php echo $produit->proNom ?></p>
            <p><?php echo $produit->puCommentaire ?></p>
            <p>Quantité: <?php echo $produit->puQuantite . " " . $produit->uniLibelle ?></p>
            <button type="submit" class="btn btn-primary">Echanger</button>
        </form>
        <?php
    }
}


?>
<?php include(VIEW_PATH . 'default/footer.php'); ?>