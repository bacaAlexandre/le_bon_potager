<?php include(VIEW_PATH . 'default/header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo Route::get_uri('AdminUtilisateurController@index'); ?>">Liste utilisateurs
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Route::get_uri('AdminProduitController@index'); ?>">Liste produits</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo Route::get_uri('AccueilController@index'); ?>">Quitter partie admin
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
    </div>
</nav>