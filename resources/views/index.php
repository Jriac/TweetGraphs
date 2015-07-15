
<html ng-app="bootcamp">
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>    
		<script src="/bower_components/angular/angular.js"> </script>
       <script src="/bower_components/angular-resource/angular-resource.js"> </script>
        <script src="/js/bootcamp.js"></script>
        <!--https://apps.twitter.com/app/8541478-->
        
		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content" ng-controller='MainController'>
			
				<h1 class="title">Hi!.{{name}}</h1>
				<!--	<button ng-click="fnAlert(name)"> Alerta</button>
					-->
			</div>
		
			<br>
			<div class="content" ng-controller='NameController'>
			
				<h1 class="title">Hi!.{{name}}</h1>
				
					<div>{{items[0].title}}</div>
			<section>
           
			    <input type="text" ng-model="buscar">
			    <article ng-repeat="item in items | filter:buscar" ng-if="item.tipo==2">
			        <h1>{{item.title}}</h1>
			        <span>{{item.desc}}</span>
			        
			    </article>
			    
			</section>
			
			</div>
			<!--
			<input type="text" ng-model="name" >
-->		</div>
	</body>
</html>
