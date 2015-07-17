$(function function_submit() {
    $("#pass_submit").click(function() {
        var pass = $("input#password").val();
        var pass2 = $("input#password2").val();
        if (pass != pass2) {
            alert("hola!")
              $("#message").val("Los passwords no son iguales");
            return false;
          
        }
        $.ajax({
            type: "POST",
            url: '/v1/user/update_password',
            data: {'password':$('input[name=password]').val(), '_token':$('input[name=_token]').val()},
              success: function(data) {
                alert(data.body);
                if (data.body == ""){
                  //var prob =  document.getElementById('prob');
                    //prob.innerHTML="ESTE EMAIL YA ESTA EN USO!";
                    //document.getElementById('email').style.backgroundColor =  "#ff6666";
                    //$('input[name=email]').val('');
                } else if(data.body == "USER ADDED TO DB CORRECTLY"){
                 //   window.location.replace("http://bootcamp.incubio.com:8080/");
                }
            }
        });
        return false;
    });
});