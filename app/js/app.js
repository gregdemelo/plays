'use strict';

/* App Module */

var playsApp = angular.module('playsApp', [
  'ngRoute',
  'playsControllers',
  'playsServices'
]);
// 
playsApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'app/index.html',
        controller: 'RolesController'
      });
}]);
