<?php include(VIEW_PATH . 'default/header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($this->is_group('Accueil') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo $this->view('/') ?>">Accueil</a>
            </li>
            <li class="nav-item <?php echo ($this->is_group('Annonce') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo $this->view('/annonce'); ?>">Nos annonces</a>
            </li>
            <li class="nav-item <?php echo ($this->is_group('Potager') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo $this->view('/potager'); ?>">Mon potager</a>
            </li>

            <?php if ($this->session()->is_logged()) { ?>
                <li class="nav-item <?php echo ($this->is_group('Compte') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo $this->view('/compte'); ?>">Mon compte</a>
                </li>
            <?php } else { ?>
                <li class="nav-item <?php echo ($this->is_group('Connexion') ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo $this->view('/connexion'); ?>">Mon compte</a>
                </li>
           <?php } ?>
            <?php
                if (($this->session()->is_logged()) && ($this->session()->get_role() === 'Admin')) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->view('/admin/utilisateur'); ?>">Panel admin</a>
                    </li>
                <?php }
            ?>
        </ul>
    </div>
</nav>