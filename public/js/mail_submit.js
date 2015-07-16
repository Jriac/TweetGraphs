$(function function_submit() {
    $("#submit_register").click(function() {
        var email = $("input#email").val();
        if (email == "") {
            return false;
        }
        $.ajax({
            type: "POST",
            url: '/form/sendEmail',
            data: {'email':$('input[name=email]').val(), '_token':$('input[name=_token]').val()},
            success: function(data) {
                alert(data.body);
            }
        });
        return false;
    });
});