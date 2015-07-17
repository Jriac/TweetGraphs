$(function function_login() {
    $("#submit_login").click(function() {
        $.ajax({
            type: "POST",
            url: '/v1/user/login',
            data: {'mail':$('input[name=email_login]').val(), 'password':$('input[name=password_login]').val(), '_token':$('input[name=_token]').val()},
            success: function(data) {
                alert(data.body);
            }
        });
        return false;
    });
});