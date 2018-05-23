<?php include(VIEW_PATH . 'default/header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($this->is_group('AdminUtilisateur') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo $this->view('/admin/utilisateur'); ?>">Gestion utilisateurs</a>
            </li>
            <li class="nav-item <?php echo ($this->is_group('AdminAnnonce') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo $this->view('/admin/annonce'); ?>">Gestion annonces</a>
            </li>
            <li class="nav-item <?php echo ($this->is_group('AdminProduit') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo $this->view('/admin/produit'); ?>">Gestion produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $this->view('/admin/statistique'); ?>">Statistique annonces</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $this->view('/'); ?>">Retour accueil</a>
            </li>

        </ul>
    </div>
</nav>