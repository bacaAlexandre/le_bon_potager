<?php include(VIEW_PATH . 'default/nav.php');?>
<div class="">
    <h1>Vous allez être mis en relation avec le vendeur</h1>
</div>
<div class="container rounded">
    <div class="row">
        <div class="col-md-2">
            <img class="img-fluid" src="<?php echo PUBLIC_URI . "img/" . $data->proImg ?>" width="150px" height="150px" alt="Tomate">
        </div>
        <div class="col-md-3">
            <div class="col-md-12">
                Vendeur : <?php echo $data->utiPseudo ?>
            </div>
            <div class="col-md-12">
                Produit : <?php echo $data->proNom ?>
            </div>
            <div class="col-md-12">
                Quantité : <?php echo $data->puQuantite . " " . $data->uniLibelle ?>
            </div>
        </div>
        <div class="col-md-7 justify-content-md-center">
            <?php echo $data->puCommentaire ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 md-6">
        <form action="<?php echo Route::get_uri('ContactController@contacter') ?>" method="post">
            <fieldset>
                <legend>Contacter l'annonceur</legend>
                <div class="form-group">
                    <label for="nickname">Votre pseudo :</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php echo $pseudo ?>">
                </div>
                <div class="form-group">
                    <label for="email">Votre e-mail * :</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="phone">Votre téléphone :</label>
                    <input type="tel" name="phone" id="phone" class="form-control" value="<?php echo $phone ?>">
                </div>
                <div class="form-group">
                    <label for="message">Votre message *:</label>
                    <textarea rows="5" name="message" id="message" class="form-control" required>
                        <?php echo $message ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantité *:</label>
                    <input type="number" id="quantity" name="qté" id="qté"><span><?php echo $data->uniLibelle ?></span>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="copy" class="form-check-input">
                    <label for="copy" class="form-check-label">Je souhaite recevoir une copie de cet email</label>
                </div>
                <input type="hidden" name="max" value="<?php echo $data->puQuantite ?>">
                <input type="hidden" name="id" value="<?php echo $data->id_produit ?>">
                <button type="submit" class="btn btn-success">Envoyer l'email</button>
                <?php if ($this->flash('error') !== null) { ?>
                    <ul class='alert alert-danger' role='alert'>
                        <?php foreach ($this->flash('error') as $error) {
                            echo "<li>$error</li>";
                        } ?>
                    </ul>
                <?php } ?>
            </fieldset>
        </form>
    </div>
    <div class="col-md-6 md-6">
        <h4>Informations de l'annonceur</h4>
        <div class="form-group">
            <div class="spe">Biographie :</div>
            <div class="form-control"><?php echo $data->utiDescription ?></div>
        </div>
        <div class="form-group">
            <div class="spe">Adresse :</div>
            <div class="form-control">
                <?php if ($data->utiAdresseAffiche == 1) { ?>
                    <?php echo $data->utiAdresse ?>
                <?php } ?>
            </div>
        </div>
        <div class="form-group">
            <div class="spe">Téléphone :</div>
            <div class="form-control">
                <?php if ($data->utilTelAffiche == 1) { ?>
                    <?php echo $data->utiTel ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>
