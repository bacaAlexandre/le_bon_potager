<?php include(VIEW_PATH.'default/nav.php'); ?>
<div class="row">
      <div class="col-md-6 md-6">
        <form action="/verification.php" method="post">
          <fieldset>
            <legend>Contacter l'annonceur</legend>
            <div class="form-group">
              <label for="nickname">Votre pseudo :</label>
              <input type="text" name="nickname" id="nickname" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Votre e-mail :</label>
              <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="phone">Votre téléphone :</label>
              <input type="tel" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
              <label for="message">Votre message :</label>
              <textarea rows="5" id="message" class="form-control"></textarea>
            </div>
            <div class="form-check">
              <input type="checkbox" id="copy" class="form-check-input">
              <label for="copy" class="form-check-label">Je souhaite recevoir une copie de cet email</label>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer l'email</button>
          </fieldset>
        </form>
      </div>
    </div>
<?php include(VIEW_PATH.'default/footer.php'); ?>
