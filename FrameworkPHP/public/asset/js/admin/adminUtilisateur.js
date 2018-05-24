$(function () {

    $("#btn_edit_user").click(function () {
        $.ajax({
            url: PUBLIC_URL + "?admin/utilisateur/edit",
            method: "POST",
            data: {
                id: $(this).val(),
            },
            success: function (json) {
                let data = JSON.parse(json);

                $("#address").html(data.adresse);

                if (data.adresse_affiche == 1) {
                    $("#adresse_visible").attr('checked', 'checked');
                }

                $("#postal_code").append("<option disabled>--</option>");
                for (i = 0; i < data.code_postal.length; i++) {
                    if (data.code_postal.user_code_postal == data.code_postal.id_code_postal) {
                        $("#postal_code").append("<option value=" + data.code_postal[i]['id_code_postal'] + " selected>" + data.code_postal[i]['cpLibelle'] + "</option>"
                        )
                        ;
                    } else {
                        $("#postal_code").append("<option value=" + data.code_postal[i]['id_code_postal'] + ">" + data.code_postal[i]['cpLibelle'] + "</option>");
                    }
                }
                $("#tel").val(data.phone);

                if (data.tel_affiche == 1) {
                    $("#tel_visible").attr('checked', 'checked');
                }

                $("#pseudo").val(data.pseudo);
                $("#pseudo").data("id_utilisateur", data.id_utilisateur);
                $("#email").val(data.email);
                $("#biography").html(data.description);

                $('.block_error_modal').empty();
                $(".form-control").removeClass("is-invalid");

            }
        })
    });

    $("#modal_admin_user_valide").click(function () {
        $.ajax({
            url: PUBLIC_URL + "?admin/utilisateur/changeinfos",
            method: "POST",
            data: {
                id: $("#pseudo").data('id_utilisateur'),
                password: $("#password").val(),
                address: $("#address").val(),
                address_visible: $("#address_visible").is(':checked'),
                postal_code: $("#postal_code").val(),
                tel: $("#tel").val(),
                tel_visible: $("#tel_visible").is(':checked'),
                pseudo: $("#pseudo").val(),
                email: $("#email").val(),
                biography: $("#biography").html(),
            },
            success: function (json) {
                let data = JSON.parse(json);
                $('.block_error_modal').empty();
                $(".form-control").removeClass("is-invalid");
                $("#password").val("");

                if (data.message == "KO") {
                    $('.block_error_modal').removeClass("invisible");
                    for (i = 0; i < data.error.length; i++) {
                        $("#" + data.error[i].input).addClass("is-invalid");
                        $(".block_error_modal").append("<ul class='alert alert-danger' role='alert'>" + data.error[i].message + "</ul>");
                    }
                } else {
                    $('.close').trigger('click');
                    location.reload();
                }

            }
        })
    });

});



