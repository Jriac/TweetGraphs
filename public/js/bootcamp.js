
var bootcamp=angular.module('bootcamp',['ngResource']);
angular.module('bootcamp').controller(
    'MainController',
    [
        '$scope',function($scope){
            $scope.fnAlert=function (str){
            alert(str);
            };
          //  $scope.name="Justin"
        }
                                    
    ]
);

angular.module('bootcamp').controller(
    'NameController',
    [
        '$scope',
        'ItemResource',
        function($scope,ItemResource){
            console.log('Hola!');
            $scope.name="Wesker"
        $scope.items=ItemResource.items;
            ItemResource.getItems();
        }
    
                                    
    ]
);


angular.module('bootcamp').factory(
    'ItemResource',
    [
      '$resource',
        function ($resource){
            
            var resource={};
            resource.items=[];
            var item=$resource('/trends',{},{
            get:{method:'GET',isArray:true}
            
            
            });
            resource.getItems=function(){
            
                item.get().$promise.then(function(data){
                
                angular.copy(data,resource.items);
                
                    
                
                });
                
                return [{
                title:'verde',
                desc:'item1 description',
                tipo:1
                },
                       {
                title:'azul',
                desc:'item2 description',
                tipo:2
                },
                        
                {
                title:'amarillo',
                desc:'item3 description',
                tipo:2
                }
                       ];
           
            };
             return resource;
            
        }
        ]
);