$(function() {

    let form =  $('#connexion');
    let email = $(form).find('#connexion_email');
    let password = $(form).find('#connexion_password');
    let error = $(form).find('#connexion_error');
    $(error).empty().hide();

    $(form).on('hidden.bs.modal', function () {
        form[0].reset();
        $(form).find('.is-invalid').removeClass('is-invalid');
        $(error).empty().hide();
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
                console.log(data);
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
    });
});