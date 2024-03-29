<?php include(VIEW_PATH . 'default/header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo (URI === '/' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo Route::get_uri('AccueilController@index'); ?>">Accueil</a>
            </li>
            <li class="nav-item <?php echo (strpos(URI, '/annonce') === 0 ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo Route::get_uri('AnnonceController@index'); ?>">Nos annonces</a>
            </li>
            <li class="nav-item <?php echo (URI === '/potager' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo Route::get_uri('MonPotagerController@index'); ?>">Mon potager</a>
            </li>

            <?php if ($this->session()->is_logged()) { ?>
                <li class="nav-item <?php echo (URI === '/compte' ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo Route::get_uri('ConnexionInscriptionController@index'); ?>">Mon compte</a>
                </li>
            <?php } else { ?>
                <li class="nav-item <?php echo (URI === '/connexion' ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo Route::get_uri('ConnexionInscriptionController@index'); ?>">Mon compte</a>
                </li>
           <?php } ?>
            <?php
                if (($this->session()->is_logged()) && ($this->session()->get_role() === 'Admin')) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo Route::get_uri('AdminUtilisateurController@index'); ?>">Panel admin</a>
                    </li>
                <?php }
            ?>
        </ul>
    </div>
</nav>