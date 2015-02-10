var login = angular.module('login',['angular-capitalize-filter','ngSanitize','mgcrea.ngStrap', 'angularUtils.directives.dirPagination']);

angular.module('angular-capitalize-filter', [])
  .filter('capitalize', function() {
    return function (input, format) {
      if (!input) {
        return input;
      }
      format = format || 'all';
      if (format === 'first') {
        // Capitalize the first letter of a sentence
        return input.charAt(0).toUpperCase() + input.slice(1).toLowerCase();
      } else {
        var words = input.split(' ');
        var result = [];
        words.forEach(function(word) {
          if (word.length === 2 && format === 'team') {
            // Uppercase team abbreviations like FC, CD, SD
            result.push(word.toUpperCase());
          } else {
            result.push(word.charAt(0).toUpperCase() + word.slice(1).toLowerCase());
          }
        });
        return result.join(' ');
      }
    };
  });

login.controller('dateCtrl', function($scope) {
});

'use strict';


login.config(function($datepickerProvider) {
  angular.extend($datepickerProvider.defaults, {
    dateFormat: 'MM/dd/yyyy',
    startWeek: 1
  });
})

login.controller('DatepickerDemoCtrl', function($scope, $http) {

  console.log('load');
  $scope.selectedDate = new Date();
  $scope.selectedDateAsNumber = Date(1986, 1, 22);
  // $scope.fromDate = new Date();
  // $scope.untilDate = new Date();
  $scope.getType = function(key) {
    return Object.prototype.toString.call($scope[key]);
  };

  $scope.clearDates = function() {
    $scope.selectedDate = null;
  };

});
