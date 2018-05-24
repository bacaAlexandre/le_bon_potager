  <footer>
      <div class="tweet">
          <a href="https://twitter.com/GardenParty15?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-lang="fr" data-show-count="false">Follow @GardenParty15</a>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
      Copyright &copy; <?php echo date("Y"); ?>
  </footer>

  <?php if (!$this->session()->is_logged()) { ?>
      <form class="modal fade" id="connexion">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Déjà inscrit ? Connectez-vous !</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <div class="modal-body">
                      <fieldset>
                          <?php if ($this->flash('success_registration') !== null) { ?>
                              <div class="col-12 alert alert-success">
                                  <p><?php echo $this->flash('success_registration'); ?></p>
                              </div>
                          <?php } ?>

                          <div class="form-group">
                              <label for="connexion_email">Votre e-mail :</label>
                              <input type="email" name="email" placeholder="Ex: garden.party@orange.fr" id="connexion_email" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="connexion_password">Votre mot de passe :</label>
                              <input type="password" name="password" placeholder="Ex: Garden76" id="connexion_password" class="form-control">
                          </div>

                          <ul class="alert alert-error" id="connexion_error" role="alert"></ul>
                      </fieldset>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-success">Se connecter</button>
                  </div>
              </div>
          </div>
      </form>


      <form class="modal fade" id="inscription">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Inscrivez-vous !</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <fieldset>
                          <div class="form-group">
                              <label for="inscription_email">Votre e-mail* :</label>
                              <input type="email" name="email" placeholder="Ex: garden.party@orange.fr" id="inscription_email" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="inscription_password">Votre mot de passe * :</label>
                              <input type="password" name="password" placeholder="Ex: Garden76" id="inscription_password" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="inscription_password_repeat">Confirmer votre mot de passe * :</label>
                              <input type="password" name="password_repeat" placeholder="Ex: Garden76" id="inscription_password_repeat" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="inscription_pseudo">Votre pseudonyme * :</label>
                              <input type="text" name="pseudo" placeholder="Ex: John Smith" id="inscription_pseudo" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="inscription_adresse">Votre adresse * :</label>
                              <textarea rows="3" name="adresse" placeholder="Ex: 5ème Maison en entrant à Asgard, Valhalla" id="inscription_adresse" class="form-control"></textarea>
                          </div>
                          <div class="form-group">
                              <label for="inscription_code_postal">Votre code postal * :</label>
                              <select id="inscription_code_postal" class="form-control">
                                  <option disabled selected>--</option>
                                  <?php
                                  $t_code_postal = new Model('T_CODE_POSTAL');
                                  foreach ($t_code_postal->findAll() as $val) {
                                      echo "<option value=\"" . $val->id_code_postal . "\" data-code-postal=\"" . $val->cpLibelle . "\">" . $val->cpLibelle . "</option>";
                                  } ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="inscription_tel">Votre n° de téléphone :</label>
                              <input type="tel" name="telephone" placeholder="0625091996" id="inscription_tel" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="inscription_biographie">Votre biographie :</label>
                              <textarea rows="5" name="biographie" placeholder="Ancien dieu du royaume du Valhalla j'ai pris ma retraite et je souhaites vous faire découvrir les mets divins présents sur notre terre." id="inscription_biographie" class="form-control"></textarea>
                          </div>
                          <div class="form-check">
                              <input type="checkbox" id="inscription_adresse_visible" class="form-check-input">
                              <label for="inscription_adresse_visible" class="form-check-label">J'autorise l'affichage de mon adresse dans mes
                                  annonces.</label>
                          </div>
                          <div class="form-check">
                              <input type="checkbox" id="inscription_tel_visible" class="form-check-input">
                              <label for="inscription_tel_visible" class="form-check-label">J'autorise l'affichage de mon n° de tél. dans mes
                                  annonces.</label>
                          </div>
                          <p>* Champs obligatoires</p>

                          <ul class="alert alert-error" id="inscription_error" role="alert"></ul>
                      </fieldset>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-success">S'inscrire</button>
                  </div>
              </div>
          </div>
      </form>
  <?php } ?>


</div>

</body>

</html>