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

                $("#postal_code").html(data.code_postal);
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



