  <footer>
      <div class="tweet">
          <a href="https://twitter.com/GardenParty15?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-lang="fr" data-show-count="false">Follow @GardenParty15</a>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
      Copyright &copy; <?php echo date("Y"); ?>
  </footer>

  <?php if (!$this->session()->is_logged()) { ?>
      <div class="modal fade" id="connection">
          <div class="modal-dialog">
              <div class="modal-content">
                  <form>

                      <div class="modal-header">
                          <h4 class="modal-title">Déjà inscrit ? Connectez-vous !</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <div class="modal-body">
                          <fieldset>
                              <div class="form-group">
                                  <label for="email_con">Votre e-mail :</label>
                                  <input type="email" name="email" id="email_con" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="password_con">Votre mot de passe :</label>
                                  <input type="password" name="password" id="password_con" class="form-control">
                              </div>

                              <ul class="alert alert-danger" id="error_con" role="alert"></ul>
                          </fieldset>
                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                          <button type="submit" class="btn btn-success">Se connecter</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  <?php } ?>


</div>

</body>

</html>