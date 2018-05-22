<?php include(VIEW_PATH . 'default/navAdmin.php'); ?>
    <div class="row">
        <h1>Gestion des utilisateurs</h1>
    </div>
<?php foreach ($users as $user) {
    if ($user->id_utilisateur !== $this->session->get_user_id()) {
        ?>
        <div class="row">
            <div class="col-md-12 md-12">
                <div class="card">
                    <div class="card-header">ID : <?php echo $user->id_utilisateur; ?></div>
                    <div class="card-body">
                        <div><p class="card-text">Utilisateur : <?php echo $user->utiPseudo; ?></div>
                    </div>
                    <div class="card-footer text-right">
                        <!--                        <a href="-->
                        <?php //echo $this->view('admin/utilisateur/' . $user->id_utilisateur . '/edit') ?><!--">-->
                        <button type="button" class="btn btn-warning" id="btn_edit_user" data-toggle="modal" data-target="#modal_edit" value=<?php echo $user->id_utilisateur; ?>><i
                                    class="fas fa-wrench"></i></button>
                        <!--                        </a>-->
                        <a href="<?php echo $this->view('admin/utilisateur/' . $user->id_utilisateur . '/lock') ?>">
                            <button type="submit" value="lock" class="btn btn-danger"><i
                                        class="fa <?php echo($user->utiDesactive ? 'fa-unlock' : 'fa-lock') ?>"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modal_edit">
            <div class="modal-dialog" id="modal_admin_user">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Gestion de l'utilisateur</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <fieldset>
                                <legend>Informations</legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Son nouveau mot de passe :</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                   minlength="8">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Son adresse :</label>
                                            <textarea rows="2" name="address" id="address" class="form-control"
                                                      placeholder="Saisir votre adresse." required></textarea>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" id="address_visible" name="adresse_affiche"
                                                   class="form-check-input">
                                            <label for="address_visible" class="form-check-label">J'autorise l'affichage
                                                de son adresse dans ses annonces.</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="postal_code">Son code postal :</label>
                                            <select name="postal_code" id="postal_code" class="form-control" required>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tel">Son téléphone :</label>
                                            <input type="tel" name="tel" id="tel" class="form-control" value=""
                                                   minlength="10" maxlength="10">
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" id="tel_visible" name="tel_affiche"
                                                   class="form-check-input">
                                            <label for="tel_visible" class="form-check-label">J'autorise l'affichage de
                                                son n° de tél. dans ses annonces.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pseudo">Son pseudonyme :</label>
                                            <input type="text" name="pseudo" id="pseudo" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Son email actuel :</label>
                                            <input type="text" name="email" id="email" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="biography">Sa biographie :</label>
                                            <textarea rows="5" name="biography" id="biography" class="form-control"
                                                      placeholder="Faire une description concernant ses produits."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <ul class='alert alert-danger invisible' role='alert'></ul>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Valider</button>
                    </div>
                </div>
            </div>
        </div>

    <?php }
} ?>
<?php include(VIEW_PATH . 'default/footer.php'); ?>