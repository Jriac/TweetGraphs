
var bootcamp = angular.module('bootcamp',['ngResource']);

angular.module('bootcamp').controller(
    'MainController',
    [
        '$scope',
        'ItemResource',
        function($scope, ItemResource){
            
            $scope.fnAlert = function(){
                
                alert("hola!");
                
            };
            
            $scope.items = ItemResource.getItems();
            
        }
    ]
);

angular.module('bootcamp').factory(
    'ItemResource',
    [
        '$resource',
        function($resource){
            
            var resource = {};
            
            
            var item = $resource('/item', {},{
                get :{method : 'GET', isArray : true}
            });
            resource.getItems = function(){
                
                item.get().$promise.then(function(data){
                
                console.log ("DATOS",data);
                });
                
                return [{
                    title:'item1',
                    desc:'Item1 Desc'
                }];
                
            };
            
            return resource;
        }
    ]
);