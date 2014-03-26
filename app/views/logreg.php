<!-- login and register box -->
<div id="log-reg"  ng-controller="LogRegController">
	<ul class="nav nav-tabs">
		<li ng-class="{active:reglog.reg.isActive}" ng-click="reglog.reg.choose()"><a href="" >注册</a></li>
		<li ng-class="{active:reglog.log.isActive}" ng-click="reglog.log.choose()"><a href="" >登陆</a></li>
	</ul>
	<!-- form of login and register -->
	<div class="row">
		<form action="" id="regForm" class="col-md-4" ng-dshow="" ng-submit="user.submit()">
			<div  ng-class="user.email.style" class=""> 
				<label for="email" class="control-label" ng-bind="user.email.label">电子邮箱</label>
				<input type="email" class="form-control"  id="email" type="email" required placeholder="Enter email" ng-model="user.email.input">
			</div>
			<div class="form-group"ng-show="reglog.reg.isActive">
				<label for="name" >姓名</label>
				<input type="text" class="form-control" id="name" required placeholder="Your name" ng-model="user.name.input" />
			</div>
			<div class="form-group">
				<label for="password">密码</label>
				<input type="password" class="form-control" id="password" placeholder="Password" ng-model="user.passwd.input">
			</div>
			<div  ng-show="reglog.reg.isActive" ng-class="user.repasswd.style">
				<label for="re-password" class="control-label" ng-bind="reglog.repasswd.label"></label>
				<input type="password" class="form-control" id="re-password" placeholder="Password" ng-model="user.repasswd.input" >
			</div>
			<button type="submit" class="btn btn-success" ng-bind="reglog.submitBtn">确认注册</button>
		</form>
	</div>
</div>