<?php include(VIEW_PATH . 'default/nav.php'); ?>
    <div class="row rounded">
        <h1>Confectionnez votre panier maraîcher</h1>
    </div>
    <div class="row rounded-top">
        <div class="col-md-12">
            <form action="<?php echo Route::get_uri('AnnonceController@recherche') ?>" method="post">
                <fieldset>
                    <legend>De quoi avez-vous envie ?</legend>
                    <div class="form-row">
                        <div class="form col-md-5 md-5">
                            <select name="product" class="form-control">
                                <option disabled selected>Produit</option>
                                <?php
                                $categorie = "";
                                foreach ($produits as $produit) {
                                    if ($categorie != $produit->catNom) {
                                        echo "<optgroup label='$produit->catNom'>";
                                    }
                                    echo "<option value='$produit->id_produit'>$produit->proNom</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form col-md-5 md-5">
                            <select name="dep" class="form-control">
                                <option disabled selected>Département</option>
                                <?php
                                foreach ($department as $dep) {
                                    echo "<option value='$dep->id_departement'>$dep->depLibelle</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form col-md-2 md-2">
                            <button type="submit" name="search" class="btn btn-success">Rechercher</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="row rounded-bottom main">
    </div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>