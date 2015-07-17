<!DOCTYPE html>
<html ng-app="bootcamp">

<head>
    <meta charset="UTF-8">
    <title>Recuperar contrasenya</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

    <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/js/mail_submit.js" type="text/javascript"></script>
    <script src="/js/function_login.js" type="text/javascript"></script>

    <script src="/bower_components/angular/angular.js"></script>
    <script src="/bower_components/angular-resource/angular-resource.js"></script>
    <script src="/js/bootcamp.js"></script>

    <link rel="stylesheet" href="css/style.css">   
</head>

<body>

  <div class="form">
    <div id="recover">
      <h1>Recuperar contrasenya</h1>
      <form ng-submit="submit()" name="f1">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="field-wrap">
            <label>
              MAIL<span class="req">*</span>
            </label>
            <input type="email" name="email" id="email" ng-model="user.email" required autocomplete="off" />
          </div>

           <button ng-disabled="f1.$invalid" id="mail_submit" class="button button-block" />Enviar</button>
      </form>
    </div>


   </div>
    <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>

</body>

</html>