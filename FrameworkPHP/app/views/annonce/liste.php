<?php include(VIEW_PATH . 'default/nav.php'); ?>
    <div class="row rounded">
        <h1>Voici les résultats de votre recherche :</h1>
    </div>

<?php

foreach ($produits as $produit) { ?>
    <div>
        <img src="<?php echo PUBLIC_PATH."asset/img/".$produit->proImg ?>" alt="">
        <p><?php echo $produit->utipseudo ?></p>
        <p><?php echo $produit->proNom ?></p>
        <p>Quantité: <?php echo $produit->puQuantite . " " . $produit->uniLibelle ?></p>
        <input type="submit" value="Echanger">
    </div>
    <?php
}

?>
<?php include(VIEW_PATH . 'default/footer.php'); ?>