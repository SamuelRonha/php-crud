/**
 * Created by Samuel on 17/06/2017.
 */
app.controller("programadorController", function ($scope, $http) {
    $scope.programadores = [];
    $scope.programador = {
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
            url: 'http://localhost/php-crud/api/programador/findAll.php'
        }).then(function (response) {
            $scope.programadores = [];
            $scope.programadores = response.data.programador;
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
                url: 'http://localhost/php-crud/api/programador/findOne.php/?id=' + $scope.busca.id
            }).then(function (response) {
                $scope.programadores = [];
                $scope.busca = {};
                $scope.programadores.push(response.data);
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
            url: 'http://localhost/php-crud/api/programador/findByName.php/?nome=' + $scope.busca.nome
        }).then(function (response) {
            $scope.programadores = [];
            $scope.busca = {};
            $scope.programadores.push(response.data);
            console.log(response.data);

        }, function (response) {
        });
    };

    $scope.save = function () {
        url = "http://localhost/php-crud/api/programador/save.php";
        verb = 'POST';
        if ($scope.programador.id != null) {
            url = "http://localhost/php-crud/api/programador/update.php";
            verb = 'PUT';
        }
        console.log($scope.programador)
        $http({
            method: verb,
            url: url,
            data: $scope.programador
        }).then(function (response) {
            $scope.programador = response.data;
            $scope.load();
            alert(response.data.message);
        }, function (response) {

        });
    };

    $scope.excluir = function (id) {
        $http({
            method: 'DELETE',
            url: 'http://localhost/php-crud/api/programador/delete.php/?id=' + id
        }).then(function (response) {
                console.log(response)
                $scope.load();
            }
            , function (response) {
            });

    }

    $scope.alterar = function (programador) {
        $scope.programador = angular.copy(programador);
    };

    $scope.limpar = function () {
        $scope.programador = {};
    };

    $scope.load();

});

