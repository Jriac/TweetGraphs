$(function function_submit() {
    $("#mail_submit").click(function() {
        var mail = $("input#email").val();
        if (mail == "") {
            return false;
        }
        $.ajax({
            type: "POST",
            url: '/v1/user/send_recover_mail',
            data: {'mail':$('input[name=email]').val(), '_token':$('input[name=_token]').val()},
        });
        return false;
    });
});