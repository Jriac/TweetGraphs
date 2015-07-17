$(function function_login() {
    $("#submit_login").click(function() {
        $.ajax({
            type: "POST",
            url: '/form/login',
            data: {'email':$('input[name=email_login]').val(), 'password':$('input[name=password_login]').val(), '_token':$('input[name=_token]').val()},
            success: function(data) {
                if(data.body == "USER LOGGED IN CORRECTLY"){
                    window.location.replace("http://bootcamp.incubio.com:8080/home");
                } else if(data.body == "WRONG MAIL OR PASSWORD"){
                    document.getElementById("email_login").style.backgroundColor = "#ff6666";
                    document.getElementById("password_login").style.backgroundColor = "#ff6666";
                    $('input[name=email_login]').val('');
                    $('input[name=password_login]').val('');
                }
            }
        });
        return false;
    });
});