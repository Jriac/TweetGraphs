<!DOCTYPE html>
<html ng-app="bootcamp">

<head>
    <meta charset="UTF-8">
    <title>Recover password</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/normalize.css">
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/js/mail_submit.js" type="text/javascript"></script>

    <script src="/bower_components/angular/angular.js"></script>
    <script src="/bower_components/angular-resource/angular-resource.js"></script>
    <script src="/js/bootcamp.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="mail-form-link">Recuperar contrasenya</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="mail-form" name="f2"  method="post" role="form" style="display: block;">

                                    
                                    <div class="form-group">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="email" name="email" id="email" ng-model="user.email" required autocomplete="off"  placeholder="Email Address" value=""/>
                                    </div>
    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="mail_submit" id="mail_submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                              
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>

</html> 