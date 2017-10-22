/**
 * Created by Samuel on 17/06/2017.
 */
app.controller("hobbyController", function ($scope, $http) {
    $scope.hobbyes = [];
    $scope.hobby = {
        id: 0,
        nome: ''
    };
    $scope.busca = {
        id: null,
        nome: null
    };


    $scope.load = function () {
        $http({
            method: 'GET',
            url: 'http://localhost/php-crud/api/hobby/findAll.php'
        }).then(function (response) {
            $scope.hobbyes = [];
            $scope.hobbyes = response.data.hobby;
            console.log(response.data)

        }, function (response) {
        });
    };

    $scope.findById = function () {
        if ($scope.busca.nome != null) {
            return $scope.findByName();
        } else if ($scope.busca.id != null) {
            $http({
                method: 'GET',
                url: 'http://localhost/php-crud/api/hobby/findOne.php/?id=' + $scope.busca.id
            }).then(function (response) {
                $scope.hobbyes = [];
                $scope.busca = {};
                $scope.hobbyes.push(response.data);
                console.log(response.data)
            }, function (response) {
            });
        } else {
            return $scope.load();
        }
    };

    $scope.findByName = function () {
        $http({
            method: 'GET',
            url: 'http://localhost/php-crud/api/hobby/findByName.php/?nome=' + $scope.busca.nome
        }).then(function (response) {
            $scope.hobbyes = [];
            $scope.busca = {};
            $scope.hobbyes.push(response.data);
            console.log(response.data);

        }, function (response) {
        });
    };

    $scope.save = function () {
        url = "http://localhost/php-crud/api/hobby/save.php";
        verb = 'POST';
        if ($scope.hobby.id != null) {
            url = "http://localhost/php-crud/api/hobby/update.php";
            verb = 'PUT';
        }
        console.log($scope.hobby)
        $http({
            method: verb,
            url: url,
            data: $scope.hobby
        }).then(function (response) {
            $scope.hobby = response.data;
            $scope.load();
            alert(response.data.message);
        }, function (response) {

        });
    };

    $scope.excluir = function (id) {
        $http({
            method: 'DELETE',
            url: 'http://localhost/php-crud/api/hobby/delete.php/?id=' + id
        }).then(function (response) {
                console.log(response)
                $scope.load();
            }
            , function (response) {
            });

    }

    $scope.alterar = function (hobby) {
        $scope.hobby = angular.copy(hobby);
    };

    $scope.limpar = function () {
        $scope.hobby = {};
    };

    $scope.load();

});

