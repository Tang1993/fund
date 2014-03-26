<!doctype html>
<html lang="zh-cn" ng-app="index">
	<head>
		<meta charset="UTF-8">
		<title>The fund projectg</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css" />
		<link rel="stylesheet" href="./css/style.css" />

	</head>

	<!-- page controller -->
	<body ng-controller="PageController">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#naviList">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#" ng-bind="info.siteTitle"></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="naviList">
					<ul class="nav navbar-nav">
							<li ng-class="{active:show.tab.browse}" ng-click="switchTo.browse()"><a href="#"><span class="glyphicon glyphicon-align-left"></span> 浏览项目</a></li>
							<li ng-class="{active:show.tab.create}" ng-click="switchTo.create()"><a href="#/create"><span class="glyphicon glyphicon-plus"></span> 创建项目</a></li>
						<li ng-shoow="false" ng-class="{active:show.tab.me}" ng-click="switchTo.me()"><a href="#/logreg" ><span class="glyphicon glyphicon-user"></span> 我</a></li>
						<li ng-show="false"><a href="#/logout" >登出</a></li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>


		<!-- main content -->
		<div class="container" ng-view>



		</div>


		<script src="./js/libs/jquery.min.js"></script>
		<script src="./js/libs/bootstrap.min.js"></script>
		<script src="./js/libs/angular.min.js"></script>
		<script src="./js/libs/angular-route.js"></script>
		<script src="./js/libs/angular-resource.js"></script>
		<script src="./js/service.js"></script>	
		<script src="./js/index.js"></script>
	</body>
</html>