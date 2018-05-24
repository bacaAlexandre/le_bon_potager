$(function() {

    let form =  $('#inscription');
    let email = $(form).find('#inscription_email');
    let password = $(form).find('#inscription_password');
    let password_repeat = $(form).find('#inscription_password_repeat');
    let pseudo = $(form).find('#inscription_pseudo');
    let adresse = $(form).find('#inscription_adresse');
    let code_postal = $(form).find('#inscription_code_postal');
    let tel = $(form).find('#inscription_tel');
    let biographie = $(form).find('#inscription_biographie');
    let adresse_visible = $(form).find('#inscription_adresse_visible');
    let tel_visible = $(form).find('#inscription_tel_visible');
    let error = $(form).find('#inscription_error');

    $(form).on('hidden.bs.modal', function () {
        form[0].reset();
        $(form).find('.is-invalid').removeClass('is-invalid');
        $(error).empty().hide();
    });

    $(form).on('submit', function(e) {
        e.preventDefault();
        $(form).find('.is-invalid').removeClass('is-invalid');
        $(error).empty().hide();

        let latitude = 0;
        let longitude = 0;

        if ((adresse.val().length > 0) && ($(code_postal).find(':selected').data('code-postal') !== undefined)) {
            $.ajax({
                url: 'https://api-adresse.data.gouv.fr/search/?q=' + adresse.val() + '&postcode=' + $(code_postal).find(':selected').data('code-postal') + '&autocomplete=0&limit=1',
                method: 'GET',
                success: function (data) {
                    if (data.features.length > 0) {
                        let feature = data.features[0];
                        longitude = feature.geometry.coordinates[0];
                        latitude = feature.geometry.coordinates[1];
                    }
                }
            }).done(function() {
                $.ajax({
                    url: get_url('connexion/register'),
                    type: 'POST',
                    data: {
                        'email': email.val(),
                        'password': password.val(),
                        'password_repeat': password_repeat.val(),
                        'pseudo': pseudo.val(),
                        'adresse': adresse.val(),
                        'code_postal': code_postal.val(),
                        'tel': tel.val(),
                        'biographie': biographie.val(),
                        'adresse_visible': (adresse_visible.val() === 'on' ? 1 : 0),
                        'tel_visible': (tel_visible.val() === 'on' ? 1 : 0),
                        'latitude': latitude,
                        'longitude': longitude,
                    }
                }).done(function (data) {
                    $(password).val('');
                    $(password_repeat).val('');

                    data = JSON.parse(data);
                    if (data.length > 0) {
                        let i;
                        for (i = 0; i < data.length; i++) {
                            $('#' + data[i].input).addClass('is-invalid');
                            $(error).append('<li>' + data[i].message + '</li>');
                        }
                        $(error).slideDown();
                    } else {
                        $(error).slideUp();
                        window.location.href = get_url('#connexion');
                        window.location.reload(true);
                    }
                });
            });
        } else {
            $.ajax({
                url: get_url('connexion/register'),
                type: 'POST',
                data: {
                    'email': email.val(),
                    'password': password.val(),
                    'password_repeat': password_repeat.val(),
                    'pseudo': pseudo.val(),
                    'adresse': adresse.val(),
                    'code_postal': code_postal.val(),
                    'tel': tel.val(),
                    'biographie': biographie.val(),
                    'adresse_visible': (adresse_visible.val() === 'on' ? 1 : 0),
                    'tel_visible': (tel_visible.val() === 'on' ? 1 : 0),
                    'latitude': latitude,
                    'longitude': longitude,
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.length > 0) {
                        let i;
                        for (i = 0; i < data.length; i++) {
                            $('#' + data[i].input).addClass('is-invalid');
                            $(error).append('<li>' + data[i].message + '</li>');
                        }
                        $(error).slideDown();
                    } else {
                        $(error).slideUp();
                    }
                }
            }).done(function() {
                $(password).val('');
                $(password_repeat).val('');
            });
        }
    });
});