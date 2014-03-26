var Service = angular.module('Service',['ngResource']);
Service.factory('User', function($resource){
	return $resource('http://localhost:2000/user/:islog',{islog: '@islog'},{
		query:{method:'GET'},
		reg:{method:'POST'},
		log:{method:'POST'},
		isArray:false
	});
});