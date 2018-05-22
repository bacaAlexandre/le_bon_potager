$(function () {

    $("#btn_edit_user").click(function () {
        $.ajax({
            url: "/index.php?admin/utilisateur/edit",
            method: "POST",
            data: {
                id: $(this).val(),
            },
            success: function (data) {
                console.log(data);
            }
        })
    });
});



