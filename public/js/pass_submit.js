$(function function_submit() {
    $("#pass_submit").click(function() {
        var pass = $("input#password").val();
        var pass2 = $("input#password2").val();
        if (pass != pass2) {
            return false;
            $("div#message").val("Los passwords no son iguales");
        }
        $.ajax({
            type: "POST",
            url: '/v1/user/update_password',
            data: {'password':$('input[name=email]').val(), '_token':$('input[name=_token]').val()},
        });
        return false;
    });
});