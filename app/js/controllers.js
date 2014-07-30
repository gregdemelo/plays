'use strict';

/* Controllers */

var playsControllers = angular.module('playsControllers', []);
playsControllers.controller('RolesController', ['$scope', '$routeParams', '$http',
	function($scope, $routeParams, $http) {
  $scope.plays = [{id:"julius-ceasar",name:"Julius Caesar"}];
  $http.jsonp('/api/play/julius_ceasar?callback=JSON_CALLBACK').success(function(data){
        $scope.play = data;
  });
  $http.jsonp('/api/roles/julius_ceasar?callback=JSON_CALLBACK').success(function(data){
        $scope.roles = data;
  });
      
  $scope.predicate = 'role';
}]);
