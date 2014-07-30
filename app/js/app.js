'use strict';

/* App Module */

var playsApp = angular.module('playsApp', [
  'ngRoute',
  'playsControllers',
  'playsServices'
]);
// 
// playsApp.config(['$routeProvider',
//   function($routeProvider) {
//     $routeProvider.
//       when('/plays', {
//         templateUrl: 'partials/plays-list.html',
//         controller: 'PlayListCtrl'
//       }).
//       when('/phones/:phoneId', {
//         templateUrl: 'partials/play-detail.html',
//         controller: 'PlayDetailCtrl'
//       }).
//       otherwise({
//         redirectTo: '/plays'
//       });
//   }]);
