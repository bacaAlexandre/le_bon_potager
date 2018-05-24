<?php include(VIEW_PATH . 'default/nav.php'); ?>
<div class="">
    <h1>Vous allez être mis en relation avec le vendeur</h1>
</div>
<div class="container rounded">
    <div class="row">
        <div class="col-md-2">
            <img class="product" src="<?php echo ASSET_URL . 'img/' . $data->proImg ?>" alt="Tomate">
        </div>
        <div class="col-md-3">
            <div class="col-md-12">
                Vendeur : <?php echo $data->utiPseudo ?>
            </div>
            <div class="col-md-12">
                Produit : <?php echo $data->proNom ?>
            </div>
            <div class="col-md-12">
                Quantité : <?php echo $data->puQuantite . " " . $data->uniLibelle ?>
            </div>
        </div>
        <div class="col-md-7 justify-content-md-center">
            <?php echo $data->puCommentaire ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 md-6">
        <form action="<?php echo $this->view('/contact/envoyer') ?>" method="post">
            <fieldset>
                <legend>Contacter l'annonceur</legend>
                <div class="form-group">
                    <label for="nickname">Votre pseudonyme :</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control"
                           value="<?php echo ($this->flash('pseudo') !== null) ? $this->flash('pseudo') : $pseudo; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Votre e-mail * :</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="<?php echo ($this->flash('email') !== null) ? $this->flash('email') : $email; ?>"
                           required>
                </div>
                <div class="form-group">
                    <label for="phone">Votre téléphone :</label>
                    <input type="tel" name="phone" id="phone" class="form-control"
                           value="<?php echo ($this->flash('phone') !== null) ? $this->flash('phone') : $phone; ?>">
                </div>
                <div class="form-group">
                    <label for="message">Votre message *:</label>
                    <textarea rows="5" name="message" id="message" class="form-control"
                              required><?php echo ($this->flash('message') !== null) ? $this->flash('message') : ""; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="quantity" class="col-3 col-form-label">Quantité *:</label>
                    <div class="input-group">
                        <input type="text" id="quantity" name="quantity" class="form-control"
                               value="<?php echo ($this->flash('quantity') !== null) ? $this->flash('quantity') : ""; ?>"
                               required>
                        <div class="input-group-append">
                            <span class="input-group-text"><?php echo $data->uniLibelle; ?></span>
                        </div>


                    </div>


                </div>
            </fieldset>
        </form>
    </div>
    <div class="col-md-6 md-6">
        <h4>Informations de l'annonceur</h4>
        <div class="form-group">
            <div class="spe">Pseudonyme :</div>
            <div class="form-control"><?php echo $data->utiPseudo ?></div>
        </div>
        <?php if ($data->utiDescription) { ?>
        <div class="form-group">
            <div class="spe">Biographie :</div>
            <div class="form-control"><?php echo $data->utiDescription ?></div>
        </div>
        <?php } ?>
        <?php if (($data->utiAdresseAffiche) && ($data->utiAdresse)) { ?>
            <div class="form-group">
                <div class="spe">Adresse :</div>
                <div class="form-control">
                    <?php echo $data->utiAdresse ?>
                </div>
            </div>
        <?php } ?>
        <?php if (($data->utiTelAffiche) && ($data->utiTel)) { ?>
            <div class="form-group">
                <div class="spe">Téléphone :</div>
                <div class="form-control">
                    <?php echo $data->utiTel ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="col-md-12 md-12">
        <?php if ($longitude == 0 && $latitude == 0) { ?>
        <div class="form-group">
            <div class="spe">Carte :</div>
            <div class="form-control">
                <div id="map" class="map"></div>
                <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoiNWU5MDA2ODUiLCJhIjoiY2poaHBpZW85MDF4dTM2bzAwbDE0azl1ayJ9.LzXW1H7iBY_b-J0T87gWkQ';
                    let map = new mapboxgl.Map({
                        container: 'map', // container id
                        style: 'mapbox://styles/mapbox/streets-v10', // stylesheet location
                        center: [<?php echo $longitude ?>, <?php echo $latitude ?>] // starting position [lng, lat]
                        //minZoom: 10,
                        //zoom: 12 // starting zoom
                    });

                    let marker = new mapboxgl.Marker()
                        .setLngLat([<?php echo $data->utiLongitude ?>, <?php echo $data->utiLatitude ?>])
                        .addTo(map);

                    map.on('load', function () {
                        map.addControl(new MapboxLanguage({
                            languageField: 'fr',
                            defaultLanguage: 'fr'
                        }));
                        map.setLayoutProperty('country-label-lg', 'text-field', ['get', 'name_fr']);
                    });
                </script>
        </div>
        <?php } ?>
        <?php if ($longitude > 0 && $latitude > 0) { ?>
        <div class="form-group">
            <div class="spe">Carte :</div>
            <div class="form-control">
                <div id="map" class="map"></div>
                <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoiNWU5MDA2ODUiLCJhIjoiY2poaHBpZW85MDF4dTM2bzAwbDE0azl1ayJ9.LzXW1H7iBY_b-J0T87gWkQ';
                    let map = new mapboxgl.Map({
                        container: 'map', // container id
                        style: 'mapbox://styles/mapbox/streets-v10', // stylesheet location
                        center: [<?php echo $longitude ?>, <?php echo $latitude ?>] // starting position [lng, lat]
                        //minZoom: 10,
                        //zoom: 12 // starting zoom
                    });

                    let directions = new MapboxDirections({
                        accessToken: mapboxgl.accessToken,
                        unit: 'metric',
                        profile: 'mapbox/driving',
                        controls: {
                            inputs: false
                        }
                    });

                    map.on('load', function () {
                        directions.setOrigin([<?php echo $longitude ?>, <?php echo $latitude ?>]);
                        directions.setDestination([<?php echo $data->utiLongitude ?>, <?php echo $data->utiLatitude ?>]);
                        map.addControl(directions, 'top-left');
                        map.addControl(new MapboxLanguage({
                            languageField: 'fr',
                            defaultLanguage: 'fr'
                        }));
                        map.setLayoutProperty('country-label-lg', 'text-field', ['get', 'name_fr']);
                    });
                </script>
        </div>
        <?php } ?>
        <div class="form-check">
            <input type="checkbox" id="copy" class="form-check-input">
            <label for="copy" class="form-check-label">Je souhaite recevoir une copie de cet email</label>
        </div>
        <input type="hidden" name="max" value="<?php echo $data->puQuantite ?>">
        <input type="hidden" name="id" value="<?php echo $data->id_produit ?>">
        <button type="submit" class="btn btn-success">Envoyer l'email</button>
        <?php if ($this->flash('error') !== null) { ?>
            <ul class='alert alert-danger' role='alert'>
                <?php foreach ($this->flash('error') as $error) {
                    echo "<li>$error</li>";
                } ?>
            </ul>
        <?php } ?>
    </div>
</div>
<?php include(VIEW_PATH . 'default/footer.php'); ?>
