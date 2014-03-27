var controllerModule = angular.module("index", ['ngRoute', 'Service']);
controllerModule.directive('ngEnter', function() {
	return function(scope, element, attrs) {
		element.bind("keydown keypress", function(event) {
			if (event.which === 13) {
				scope.$apply(function() {
					scope.$eval(attrs.ngEnter);
				});

				event.preventDefault();
			}
		});
	};
});

controllerModule.config(function($httpProvider) {
//	//Enable cross domain calls
//	$httpProvider.defaults.useXDomain = true;
//
//	//Remove the header used to identify ajax call  that would prevent CORS from working
//	delete $httpProvider.defaults.headers.common['X-Requested-With'];
});

//route configuration
controllerModule.config(function($routeProvider) {
	$routeProvider.
			when('/', {
				controller: "PageController",
				templateUrl: "view/projects"
			}).
			when('/logreg', {
				controller: "PageController",
				templateUrl: 'view/logreg'
			}).
			when('/create', {
				controller: "PageController",
				templateUrl: "view/newProject"
			}).
			otherwise({
				redirectTo: '/'
			});
});


controllerModule.controller("PageController", function($scope) {
	$scope.info = {
		siteTitle: "西电众筹王"
	};
	$scope.show = {
		tab: {
			browse: true,
			create: false,
			me: false
		}
	};
	$scope.switchTo = {
		browse: function() {
			$scope.show.tab = {browse: true, create: false, me: false};
		},
		create: function() {
			$scope.show.tab = {browse: false, create: true, me: false};
		},
		me: function() {
			$scope.show.tab = {browse: false, create: false, me: true};
		}
	};
	$scope.reglog = {
		submitBtn: "确认注册",
		// switch to reg
		email: {
			label: "邮箱"
		},
		repasswd: {
			label: "重复密码"
		},
		reg: {
			// default state of reg pill
			isActive: true,
			// active reg in reglog page
			// set the pill and the content below
			choose: function() {
				// set the pill
				$scope.reglog.submitBtn = "确认注册";
				$scope.reglog.reg.isActive = true;
				$scope.reglog.log.isActive = false;
				document.getElementById('name').setAttribute('required');
			}
		},
		log: {
			// default state of log pill
			isActive: false,
			// active log in reglog page
			// set the pill and the content below
			choose: function() {
				$scope.reglog.submitBtn = "确认登陆";
				$scope.reglog.reg.isActive = false;
				$scope.reglog.log.isActive = true;
				document.getElementById('name').removeAttribute('required');
			}
		}
	};
});

controllerModule.controller("LogRegController", function($scope, User, $http) {
	//All variable and functions are defined under the namespace "user" 
	$scope.user = {
		email: {
			style: "form-group",
			label: "电邮邮箱"
		},
		repasswd: {
			style: "form-group",
			label: "重复密码"
		},
		reset: function() {
			$scope.user.email.style = "form-group";
			$scope.user.email.label = "电子邮箱";
			$scope.user.repasswd.style = "form-group";
			$scope.user.repasswd.label = "重复密码";
		}
	};
	$scope.user.submit = function() {
		($scope.reglog.log.isActive) ? $scope.user.log() : $scope.user.reg();
	};
	$scope.user.log = function() {
		var userData = {
			'islog': "login",
			'email': $scope.user.email.input,
			'passwd': $scope.user.passwd.input
		};
		User.log(userData);
	};
	$scope.user.reg = function() {
		if ($scope.user.passwd.input === $scope.user.repasswd.input) {
			// If there is no error with the password
			var userData = {
				"email": $scope.user.email.input,
				"name": $scope.user.name.input,
				"passwd": $scope.user.passwd.input
			};
			var res = User.reg(userData, function(res) {
				//Handle the response frome the server
				if (res.success === true) {
					//success
					$scope.user.reset();
					$scope.reglog.submitBtn = "注册成功";
				} else if (res.because === "email-used") {
					//email userd
					$scope.user.reset();
					$scope.user.email.style += " has-error";
					$scope.user.email.label = "邮箱已被占用";
					$scope.user.email.input = "";
					document.getElementById("email").focus();
				}
			});

		} else {
			// If the password and the repeat password are not the same 
			// make the form-group red and focus on the input
			$scope.user.repasswd.style += " has-error";
			$scope.user.repasswd.label = "两次密码不一致";
			$scope.user.repasswd.input = "";
			document.getElementById("re-password").focus();
		}
	};
});

controllerModule.controller("newController", function($scope) {
	$scope.new = {
		basicInfo: {
			isActive: true
		},
		richInfo: {
			isActive: false
		},
		teamIntro: {
			isActive: false
		},
		tag: {
			tags: [],
			input:"",
			addTagTitle:"添加标签",
			addTag: function() {
				$scope.new.tag.tags.push($scope.new.tag.input);
				$scope.new.tag.input = "";
			},
			removeTag:function(tag){
				alert(tag);	
			},
			focus:function(){
				$scope.new.tag.addTagTitle = "输入标签并回车";
				$("#addTagInput").focus();
			}
		}
	};
});

