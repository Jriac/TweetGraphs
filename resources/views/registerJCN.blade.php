<!DOCTYPE html>
<html ng-app="bootcamp">

<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/normalize.css">
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/js/function_submit.js" type="text/javascript"></script>
    <script src="/js/function_login.js" type="text/javascript"></script>

    <script src="/bower_components/angular/angular.js"></script>
    <script src="/bower_components/angular-resource/angular-resource.js"></script>
    <script src="/js/bootcamp.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <script>
        function check_pass() {
            var pass1 = document.f1.password;
            var pass2 = document.f1.pwd2;
            var goodColor = "#66cc66";
            var badColor = "#ff6666";
            if (pass1.value == pass2.value) {
                pass2.style.backgroundColor = goodColor;
                document.f1.submit_register.disabled = false;
            } else {
                pass2.style.backgroundColor = badColor;
                document.f1.submit_register.disabled = true;
            }
        }
    
 function changefocus(){
    document.getElementById('email').style.background = "rgba(19, 35, 47, 0.1)";
 }


        function change_background() {
            document.f2.email_login.style.backgroundColor = "rgba(19,35,47,0.1)";
            document.f2.password_login.style.backgroundColor = "rgba(19,35,47,0.1)";
        }

    </script>

</head>

<body>

    <div class="form">

        <ul class="tab-group">
            <li class="tab active"><a href="#signup">Registrarse</a></li>
            <li class="tab"><a href="#login">Iniciar Sesión</a></li>
        </ul>

        <div class="tab-content">
            <div id="signup">
                <h1>Registrarse</h1>

                <form ng-submit="submit()" name="f1">

                    <input type="hidden"  name="_token" value="{{ csrf_token() }}">

                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                NOMBRE<span class="req">*</span>
                            </label>
                            <input type="text" name="username" ng-model="user.nom" required autocomplete="off" />
                            

                        </div>

                        <div class="field-wrap">
                            <label>
                                APELLIDO<span class="req">*</span>
                            </label>
                            <input type="text" id="ap" name="apellido" ng-model="user.apellido" required autocomplete="off" />
                        </div>
                    </div>

                    <div class="field-wrap">
                        <label>
                            EMAIL<span class="req">*</span><span id="prob" class="probl"></span>
                        </label>
                        <input type="email" name="email" id="email" onfocus="changefocus()" ng-model="user.email" required autocomplete="off" />
                        
                    </div>


                    <div class="field-wrap">
                        <label>
                            CONTRASEÑA<span class="req">*</span>
                        </label>
                        <input type="password"  name="password" id="password" ng-model="user.password" ng-minlength="6" ng-maxlength="16" required autocomplete="off" />

                    </div>

                    <div class="field-wrap">
                        <label id="pwd2">
                            REPETIR CONTRASEÑA<span class="req">*</span>
                        </label>
                        <input type="password" name="pwd2" ng-model="user.pwd2" onkeyup="check_pass()" ng-minlength="6" ng-maxlength="16" required autocomplete="off" />
                    </div>
                    <p class="forgot"><a href="#">Campos opcionales:</a></p>
                    <div class="field-wrap">
                        <label>
                            TWITTER<span class="req"></span>
                        </label>
                        <input type="text" name="twitter" autocomplete="off" />
                        
                    </div>
                    <button ng-disabled="f1.$invalid" id="submit_register" class="button button-block" />Enviar</button>


                </form>

            </div>

            <div id="login">
                <h1>Iniciar Sesión</h1>
                <form method="post" name="f2">

                    <div class="field-wrap">
                        <label>
                            EMAIL<span class="req">*</span>
                        </label>
                        <input type="email" name="email_login" id="email_login" onfocus="change_background()" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            CONTRASEÑA<span class="req">*</span>
                        </label>
                        <input type="password" name="password_login" id="password_login" onfocus="change_background()" required autocomplete="off" />
                    </div>

                    <p class="forgot"><a href="#">¿Has olvidado tu contraseña?</a></p>

                    <button id="submit_login" class="button button-block" />Acceder</button>

                </form>

            </div>

        </div>
        <!-- tab-content -->

    </div>
    <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>

</html>