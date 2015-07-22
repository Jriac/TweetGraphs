var app = angular.module('plunker', ['ngTagsInput']);

app.controller('MainCtrl', function($scope, $http) {
    $.ajax({
        url: '/v1/user/tags',
        success: function(response) {
            jsonData = response;
        }
    });
    
    
  $scope.tags = jsonData;
});