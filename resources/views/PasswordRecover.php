<!DOCTYPE html>
<html lang="en">
<head>
  <title>Recover password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
 
<div class="container">
  <h2>Recovering password</h2>
  <div class="panel panel-default">
    <div class="panel-body">
    	<div class="form-group">
			<label>Email: </label>
       <form action="/sendEmail" method="post" enctype="text/plain">
          E-mail:<br>
          <input type="hidden" name="_token" value= "{{crsf_token()}}">
          <input type="email" name="mail" value="your email"><br>
          <input type="submit" value="Send">
          <input type="reset" value="Reset">
        </form>

			</div>
		</div>
  </div>
  </div>
</div>

</body>
</html>
