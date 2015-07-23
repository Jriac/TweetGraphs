angular.module("plunker", [ 'ngTagsInput' ]);


angular.module("plunker")
    .controller("MainCtrl", function ($scope, $http) {
        $scope.myData = {};
        $scope.myData = function (item, event) {
            var responsePromise = $http.get("home/hash");
            alert("hola");
            responsePromise.success(function (data, status, headers, config) {

                $scope.tags = [
                    {
                        text: data.body
                    }
                ];
            });
            responsePromise.error(function (data, status, headers, config) {
                alert("AJAX failed!");
            });
        };
    });
