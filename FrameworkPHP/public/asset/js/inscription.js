$(function() {

    /*let form =  $('#inscription');
    let email = $(form).find('#email_con');
    let password = $(form).find('#password_con');
    let error = $(form).find('#error_con');

    $(form).on('hidden.bs.modal', function () {
        form[0].reset();
        $(form).find('input.is-invalid').removeClass('is-invalid');
        $(form).find('#error_con').empty().hide();
    });

    $(form).on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: get_url('connexion/login'),
            type: 'POST',
            data: {
                'email': email.val(),
                'password': password.val()
            },
            success: function(data) {
                data = JSON.parse(data);
                $(form).find('.is-invalid').removeClass('is-invalid');
                $(error).empty().hide();
                if (data.length > 0) {
                    let i;
                    for (i = 0; i < data.length; i++) {
                        $('#' + data[i].input).addClass('is-invalid');
                        $(error).append('<li>' + data[i].message + '</li>');
                    }
                    $(error).slideDown();
                } else {
                    $(error).slideUp();
                    window.location.href = get_url();
                }
            }
        });
    });*/
});