/** Decalaration de mon module**/
var app = angular.module('Sql',[]);

/** Configuration du module **/
app.controller('ReadCtrl', function($scope, $http, $log){
    $http.get("db/action.php?action=read")
    .then(function(response) {
        $scope.records = response.data;
    },function(err){
        $log.error(err);
    });
    $scope.title = 'Ceci est un test.';
});

/** Fonction pour récuperer toutes les données **/
