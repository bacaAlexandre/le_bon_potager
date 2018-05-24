<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>css/map.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox-gl-js/v0.45.0/mapbox-gl.css" type="text/css" />
    <link rel='stylesheet' href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.3/mapbox-gl-directions.css" type="text/css" />
    <link rel="icon" type="image/x-icon" href="<?php echo ASSET_URL; ?>favicon.ico"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="UTF-8" src="https://api.tiles.mapbox.com/mapbox-gl-js/v0.45.0/mapbox-gl.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.3/mapbox-gl-directions.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-language/v0.9.2/mapbox-gl-language.js"></script>
    <script type="text/javascript" charset="UTF-8" src="<?php echo ASSET_URL; ?>js/master.js"></script>
    <script type="text/javascript" charset="UTF-8" src="<?php echo ASSET_URL; ?>js/admin/adminUtilisateur.js"></script>
    <script type="text/javascript" charset="UTF-8">const PUBLIC_URL = '<?php echo PUBLIC_URL?>';</script>
    <title><?php echo TITLE; ?></title>
</head>

<body>
<div class="container">
    <header>
        <img src="<?php echo ASSET_URL . 'img/Logo_Garden_Party.png' ?>">
        <p>Le bon potager pour les bonnes personnes</p>
        <?php if ($this->session()->get_user_id()) { ?>
            <p>Bonjour <?php echo $this->session()->get_pseudo() ?></p>
            <a href="<?php echo $this->view("/deconnexion"); ?>" class="btn btn-success">Déconnexion</a>
        <?php } ?>
    </header>