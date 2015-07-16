$(function function_submit() {
    $("#submit_register").click(function() {
        $.ajax({
            type: "POST",
            url: '/form/register',
            data: {'name':$('input[name=username]').val(), 'email':$('input[name=email]').val(), 'password':$('input[name=password]').val(), '_token':$('input[name=_token]').val()},
            success: function(data) {
                alert(data.body);
            }
        });
        return false;
    });
});