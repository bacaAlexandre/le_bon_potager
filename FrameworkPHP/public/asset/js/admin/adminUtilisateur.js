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

                $("#tel").html(data.phone);

                if (data.tel_affiche == 1) {
                    $("#tel_visible").attr('checked', 'checked');
                }

                $("#pseudo").html(data.pseudo);
                $("#email").html(data.email);
                $("#biography").html(data.description);

            }
        })
    });
});



