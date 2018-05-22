<?php include(VIEW_PATH . 'default/nav.php'); ?>
    <div class="row rounded">
        <h1>Confectionnez votre panier maraîcher</h1>
    </div>
    <div class="row rounded-top">
        <div class="col-md-12">

                <fieldset>
                    <legend>De quoi avez-vous envie ?</legend>
                    <div class="form-row">
                        <div class="form col-md-5 md-5">
                            <select class="form-control produit">
                                <option disabled selected>Produit</option>
                                <?php
                                    foreach ($produits as $categorie => $produits) {
                                        echo "<optgroup label='$categorie'>";
                                        foreach ($produits as $produit) {
                                            echo "<option value='$produit->id_produit'>$produit->proNom</option>";
                                        }
                                        echo "</optgroup>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form col-md-5 md-5">
                            <select class="form-control departement">
                                <option disabled selected>Département</option>
                                <?php
                                foreach ($department as $dep) {
                                    echo "<option value='$dep->id_departement'>$dep->depLibelle</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form col-md-2 md-2">
                            <button class="btn btn-success search">Rechercher</button>
                        </div>
                        <?php if ($this->flash('error') !== null) { ?>
                            <ul class='alert alert-danger' role='alert'>
                                   <?php  echo $this->flash('error') ?>
                            </ul>
                        <?php } ?>
                    </div>
                </fieldset>

        </div>
    </div>
    <div class="row rounded-bottom main">
    </div>
<script type="text/javascript">
    $('.search').click(function() {
        let dep = $('.departement').val();
        let pro = $('.produit').val();
        if (dep != null) {
            window.location.href = '<?php echo $this->view("/annonce"); ?>' + '/' + dep + (pro != null ? '/' + pro : '');
        }
    });

</script>
<?php include(VIEW_PATH . 'default/footer.php'); ?>