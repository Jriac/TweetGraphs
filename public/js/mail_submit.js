$(function function_submit() {
    $("#mail_submit").click(function() {
        var email = $("input#email").val();
        if (email == "") {
            return false;
        }
        $.ajax({
            type: "POST",
            url: '/form/sendEmail',
            data: {'mail':$('input[name=email]').val(), '_token':$('input[name=_token]').val()},
        });
        return false;
    });
});