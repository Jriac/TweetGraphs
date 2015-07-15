<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/normalize.css">
    <script src="/bower_components/jquery/jquery.js" type="text/javascript"></script>

    <link rel="stylesheet" href="css/style.css">

    <script>
        function check_pass() {
            var pass1 = document.f1.pwd;
            var pass2 = document.f1.pwd2;
            var goodColor = "#66cc66";
            var badColor = "#ff6666";
            if (pass1.value == pass2.value) {
                pass2.style.backgroundColor = goodColor;
                document.f1.submit.disabled = false;
            } else {
                pass2.style.backgroundColor = badColor;
                document.f1.submit.disabled = true;

            }
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

                <form action="/formregister" method="post" name="f1">

                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                NOMBRE<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                APELLIDO<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" />
                        </div>
                    </div>

                    <div class="field-wrap">
                        <label>
                            EMAIL<span class="req">*</span>
                        </label>
                        <input type="email" name="email" required autocomplete="off" />
                    </div>


                    <div class="field-wrap">
                        <label>
                            CONTRASEÑA<span class="req">*</span>
                        </label>
                        <input type="password"  name="pwd" size="20" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label id="pwd2">
                            REPETIR CONTRASEÑA<span class="req">*</span>
                        </label>
                        <input type="password" name="pwd2" onkeyup="check_pass(); return false;" size="20" required autocomplete="off" />
                    </div>
                    <p class="forgot"><a href="#">Campos opcionales:</a></p>
                    <div class="field-wrap">
                        <label>
                            TWITTER<span class="req"></span>
                        </label>
                        <input type="text" name="twitter" autocomplete="off" />
                        
                    </div>
                    <button type="submit" id="submit" class="button button-block" />Enviar</button>

                </form>

            </div>

            <div id="login">
                <h1>Iniciar Sesión</h1>

                <form action="/formlogin" method="post">

                    <div class="field-wrap">
                        <label>
                            EMAIL<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            CONTRASEÑA<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" />
                    </div>

                    <p class="forgot"><a href="#">¿Has olvidado tu contraseña?</a></p>

                    <button class="button button-block" />Acceder</button>

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