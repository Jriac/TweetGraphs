
angular.module("plunker", [ 'ngTagsInput' ]);


angular.module("plunker")
    .controller("MainCtrl", function ($scope, $http) {
        $scope.myData = {};
        $scope.myData.doClick= function (item, event) {
            var responsePromise = $http.get("home/hash");
            
            responsePromise.success(function (data, status, headers, config) {
                console.log(data[0].text);
                $scope.tags = data;
            });
            responsePromise.error(function (data, status, headers, config) {
                alert("AJAX failed!");
            });
            
        };
    
    $scope.addtag = function(tag){
        $http.post('/v1/user/update_password',$scope.tags);
        
    }
    
       $scope.removetag = function(tag){
        $http.post('/v1/user/update_password',$scope.tags);
        
    }
    
    });

