angular.module('app').controller(
    'MainCtrl',
    [
        '$scope',
        '$http',
        '$ItemResource',
        '$nombre_modelo',
        function($scope, $http, ItemResource, nombre_modelo) {
            $scope.tags = ItemResource.items;
            ItemResource.getItems();
    
            $scope.loadTags = function(query){
                return $http.get('v1/tag');
            };
            
            $scope.envia = function(str_name){
                nombre_modelo.CrearTag(str_name);
            };
            
            $scope.elimina = function(str_name){
                console.log('sha creat eliminat' + str_name);
            nombre_modelo.EliminarTag(str_name);
            };
        }
    ]
);