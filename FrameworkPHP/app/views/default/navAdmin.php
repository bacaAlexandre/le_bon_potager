<?php include(VIEW_PATH . 'default/header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo (URI === '/admin/utilisateur' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo Route::get_uri('AdminUtilisateurController@index'); ?>">Gestion utilisateurs</a>
            </li>
            <li class="nav-item <?php echo (URI === '/admin/annonce' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo Route::get_uri('AdminAnnonceController@index'); ?>">Gestion annonces</a>
            </li>
            <li class="nav-item <?php echo (URI === '/admin/produit' ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo Route::get_uri('AdminProduitController@index'); ?>">Gestion produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Route::get_uri('AccueilController@index'); ?>">Retour accueil</a>
            </li>
        </ul>
    </div>
</nav>