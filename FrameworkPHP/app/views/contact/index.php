<?php include(VIEW_PATH . 'default/nav.php'); ?>
<!--tu pourra supprimé les commentaires chris-->
<!-- Bloc du produit -->
<div>
    <img class="img-fluid" src="<?php echo PUBLIC_URI . "img/" . $data->proImg ?>" alt="">
    <p><?php echo $data->proNom ?></p>
    <p><?php echo $data->puCommentaire ?></p>
    <p>Quantité: <?php echo $data->puQuantite . " " . $data->uniLibelle ?></p>
</div>
<!-- Bloc du producteur -->
<div>
    <p><?php echo $data->utiPseudo ?></p>
    <p><?php echo $data->utiDescription ?></p>
    <?php if ($data->utiAdresseAffiche == 1) { ?>
        <p><?php echo $data->utiAdresse ?></p>
    <?php } ?>
    <?php if ($data->utilTelAffiche == 1) { ?>
        <p><?php echo $data->utiTel ?></p>
    <?php } ?>
</div>
<div class="row">
    <div class="col-md-6 md-6">
        <form action="" method="post">
            <fieldset>
                <legend>Contacter l'annonceur</legend>
                <div class="form-group">
                    <label for="nickname">Votre pseudo :</label>
                    <input type="text" name="nickname" id="nickname" class="form-control" value="<?php echo $pseudo ?>">
                </div>
                <div class=" form-group">
                    <label for="email">Votre e-mail * :</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email ?>"
                           required>
                </div>
                <div class=" form-group">
                    <label for="phone">Votre téléphone :</label>
                    <input type="tel" name="phone" id="phone" class="form-control" value="<?php echo $tel ?>">
                </div>
                <div class=" form-group">
                    <label for="message">Votre message :</label>
                    <textarea rows="5" id="message" class="form-control" required></textarea>
                </div>
                <div class=" form-group">
                    <!--                    TODO  j'ai rajouter un champs quantité dans le formulaire il etait mal placé sur la maquette -->
                    <label for="message">Quantité :</label>
                    <input type="text"><span><?php echo $data->uniLibelle ?></span>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="copy" class="form-check-input">
                    <label for="copy" class="form-check-label">Je souhaite recevoir une copie de cet email</label>
                </div>
                <button type="submit" class="btn btn-success">Envoyer l'email</button>
            </fieldset>
        </form>
    </div>
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>
