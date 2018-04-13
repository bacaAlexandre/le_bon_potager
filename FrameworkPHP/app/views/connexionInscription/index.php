<?php include(VIEW_PATH . 'default/nav.php'); ?>
<div class="row">
    <h1>Inscrivez-vous pour nous rejoindre !</h1>
</div>
<div class="row">
    <?php if ($this->flash('success_registration') !== null) { ?>
    <div class="col-12 alert alert-success">
        <p><?php echo $this->flash('success_registration'); ?></p>
    </div>
    <?php } ?>
    <div class="col-md-5">
        <form action="<?php echo Route::get_uri('ConnexionInscriptionController@connexion') ?>" method="post">
            <fieldset>
                <legend>Connexion</legend>
                <div class="form-group">
                    <label for="email_con">Votre e-mail :</label>
                    <input type="email" name="email" id="email_con" class="form-control"
                           value="<?php echo ($this->flash('email_connexion') !== null) ? $this->flash('email_connexion') : ""; ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="password_con">Votre mot de passe :</label>
                    <input type="password" name="password" id="password_con" class="form-control" minlength="8"
                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$" required>
                </div>
                <button type="submit" class="btn btn-success">Se connecter</button>
                <?php if ($this->flash('error_connexion') !== null) { ?>
                    <ul class='alert alert-danger' role='alert'>
                        <?php foreach ($this->flash('error_connexion') as $error) {
                            echo "<li>$error</li>";
                        } ?>
                    </ul>
                <?php } ?>
            </fieldset>
        </form>
    </div>
    <hr class="hr_con"/>
    <div class="col-md-6">
        <form action="<?php echo Route::get_uri('ConnexionInscriptionController@inscription') ?>" method="post">
            <fieldset>
                <legend>Inscription</legend>
                <div class="form-group">
                    <label for="email">Votre e-mail* :</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="<?php echo ($this->flash('email_registration') !== null) ? $this->flash('email_registration') : ""; ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="password">Votre mot de passe* :</label>
                    <input type="password" name="password" id="password" class="form-control" minlength="8"
                           pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$" required>
                </div>
                <div class="form-group">
                    <label for="password_repeat">Confirmer votre mot de passe* :</label>
                    <input type="password" name="password_repeat" id="password_repeat" class="form-control"
                           minlength="8" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$" required>
                </div>
                <div class="form-group">
                    <label for="pseudo">Votre pseudonyme* :</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control" minlength="3" maxlength="30"
                           value="<?php echo ($this->flash('pseudo') !== null) ? $this->flash('pseudo') : ""; ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="address">Votre adresse* :</label>
                    <textarea rows="3" name="address" id="address" class="form-control"
                              required><?php echo ($this->flash('address') !== null) ? $this->flash('address') : ""; ?></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="postal_code">Votre code postal * :</label>
                        <select name="postal_code" id="postal_code" class="form-control" required>
                            <option disabled <?php echo ($this->flash('postal_code') === null) ? 'selected' : ''; ?>>--</option>
                            <?php foreach ($postalCode as $val) {
                                if ($this->flash('postal_code') == $val->id_code_postal) {
                                    echo "<option value=\"" . $val->id_code_postal . "\" selected>" . $val->cpLibelle . "</option>";
                                } else {
                                    echo "<option value=\"" . $val->id_code_postal . "\">" . $val->cpLibelle . "</option>";
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="city">Votre ville * :</label>
                        <select name="city" id="city" class="form-control" required>
                            <option disabled <?php echo ($this->flash('city') === null) ? 'selected' : ''; ?>>--</option>
                            <?php foreach ($city as $val) {
                                if ($this->flash('city') == $val->id_ville) {
                                    echo "<option value=\"" . $val->id_ville . "\" selected>" . $val->vilLibelle . "</option>";
                                } else {
                                    echo "<option value=\"" . $val->id_ville . "\">" . $val->vilLibelle . "</option>";
                                }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="department">Votre département *:</label>
                    <select name="department" id="department" class="form-control" required>
                        <option disabled <?php echo ($this->flash('department') === null) ? 'selected' : ''; ?>>--</option>
                        <?php foreach ($department as $val) {
                            if ($this->flash('department') == $val->id_departement) {
                                echo "<option value=\"" . $val->id_departement . "\" selected>" . $val->depLibelle . "</option>";
                            } else {
                                echo "<option value=\"" . $val->id_departement . "\">" . $val->depLibelle . "</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Votre n° de téléphone :</label>
                    <input type="tel" name="phone" id="phone" class="form-control"
                           value="<?php echo ($this->flash('phone') !== null) ? $this->flash('phone') : ""; ?>">
                </div>
                <div class="form-group">
                    <label for="biography">Votre biographie :</label>
                    <textarea rows="5" name="biography" id="biography"
                              class="form-control"><?php echo ($this->flash('biography') !== null) ? $this->flash('biography') : ""; ?></textarea>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="address_visible" class="form-check-input" checked>&nbsp;
                    <label for="address_visible" class="form-check-label">J'autorise l'affichage de mon adresse dans mes
                        annonces.</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="tel_visible" class="form-check-input" checked>&nbsp;
                    <label for="tel_visible" class="form-check-label">J'autorise l'affichage de mon n° de tél. dans mes
                        annonces.</label>
                </div>
                <p>* Champs obligatoires</p>
                <button type="submit" class="btn btn-success">Inscription</button>
                <?php if ($this->flash('error_registration') !== null) { ?>
                    <ul class='alert alert-danger' role='alert'>
                        <?php foreach ($this->flash('error_registration') as $error) {
                            echo "<li>$error</li>";
                        } ?>
                    </ul>
                <?php } ?>
            </fieldset>
        </form>
    </div>


</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>

