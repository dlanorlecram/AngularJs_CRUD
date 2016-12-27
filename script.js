/** Decalaration de mon module**/
var app = angular.module('AppPortfolio',[]);


app.controller('DataCtrl',function($scope, $http, $log,$httpParamSerializerJQLike){


    /** READ **/


    $scope.readData = function(){
        $http.get('config/read.php')
        .then(function(reponse){
                $scope.records = reponse.data;
            },function(err){
                $log.error(err);
            });
        $scope.title = 'Fonction readData chargée!';
    };


    /** CREATE **/


    $scope.createData = function(){
        $scope.submitInsert = function(){
            $scope.obj = {
                "id":"null",
                "username": $scope.username,
                "password": $scope.password,
                "sentence": $scope.sentence
            };
            $http.post('config/insert.php',
                $httpParamSerializerJQLike($scope.obj),{
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'charset': 'UTF-8'
                    }
                }
            )
            .then(
                function(){
                    $scope.readData();
                }
            );
            console.log($scope.obj);
        };
    };


    /** UPDATE **/


    $scope.updateData = function(){

        $scope.fetchData = function(user){
            $scope.fetchId = user.id;
            $scope.fetchUsername = user.username;
            $scope.fetchPassword = user.password;
            $scope.fetchSentence = user.sentence;
        };
        $scope.update = function(){
            $scope.fetch = {
                 'id': $scope.fetchId,
                 'username': $scope.fetchUsername,
                 'password': $scope.fetchPassword,
                 'sentence': $scope.fetchSentence
                };
                console.log($httpParamSerializerJQLike($scope.fetch));
            $http.post(
                'config/update.php',
                $httpParamSerializerJQLike($scope.fetch),{
                headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'charset': 'UTF-8'
                    }
                }

            ).then(function(){
                $scope.readData();
            });
        };
    };


    /** DELETE **/


    $scope.deleteData = function(userId){
        console.log(userId);
        $scope.idSelected ={
            "id": userId
        };
        $http.post('config/delete.php',
            $httpParamSerializerJQLike($scope.idSelected),{
            headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'charset': 'UTF-8'
                }
            }
        )
        .then(function(reponse){
                $scope.records = reponse.data;
                $scope.readData();
            },function(err){
                $log.error(err);
            }
        );
    };
});
