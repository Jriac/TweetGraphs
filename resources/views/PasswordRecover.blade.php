<!DOCTYPE html>
<html lang="en">
<head>
  <title>Recover password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  <script src="/js/mail_submit.js" type="text/javascript" ></script>
  <script src="/js/jquery-1.11.3.min.js" type="text/javascript" ></script>

</head>
<body>
 
<div class="container">
  <h2>Recovering password</h2>
  <div class="panel panel-default">
    <div class="panel-body">
    	<div class="form-group">
			<label>Email: </label>
       <form>
          E-mail:<br>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="email" id="email "name="email" value="your email"/><br>
          <button type="submit" id="submit_register"/> Enviar</button>
          <input type="reset" value="Reset"/>
        </form>

			</div>
		</div>
  </div>
  </div>
</div>

</body>
</html>