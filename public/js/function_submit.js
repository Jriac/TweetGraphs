$(function function_submit() {
    $("#submit_register").click(function() {
        $.ajax({
            type: "POST",
            url: '/v1/user/register',
            data: {'name':$('input[name=username]').val(), 'mail':$('input[name=email]').val(), 'password':$('input[name=password]').val(), '_token':$('input[name=_token]').val()},
            success: function(data) {
                if (data.body == "USER ALREADY EXISTS IN DB"){
                  var prob =  document.getElementById('prob');
                    prob.innerHTML="ESTE EMAIL YA ESTA EN USO!";
                    document.getElementById('email').style.backgroundColor =  "#ff6666";
                    $('input[name=email]').val('');
                } else if(data.body == "USER ADDED TO DB CORRECTLY"){
                    window.location.replace("http://bootcamp.incubio.com:8080/#login");
                }
            }
        });
        return false;
    });
});

