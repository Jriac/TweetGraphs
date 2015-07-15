$(function function_submit() {
    $("#submit_register").click(function() {
        var email = $("input#email").val();
        if (email == "") {
            return false;
        }
        var password = $("input#password").val();
        if (password == "") {
            return false;
        }
        var dataString = 'email='+ email + '&password=' + password;
        $.ajax({
            type: "POST",
            url: '/form/register',
            data: {'email':$('input[name=email]').val(), 'password':$('input[name=password]').val(), '_token':$('input[name=_token]').val()},
            success: function(data) {
                alert(data.body);
                //$('#data_title').html(data[1].body);
                /*if (data == 0) {
                    $('.errormess').html('Wrong Login Data');
                } else {
                    $('.errormess').html('<b style="color:green;">you are logged. wait for redirection</b>');
                    document.location.href = 'private.php';
                }*/
            }
        });
        return false;
    });
});