/**
 * Created by Samuel on 17/06/2017.
 */
app.controller("analistaController", function ($scope, $http) {
    $scope.analistaes = [];
    $scope.analista = {
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
            url: 'http://localhost/php-crud/api/analista/findAll.php'
        }).then(function (response) {
            $scope.analistaes = [];
            $scope.analistaes = response.data.analista;
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
                url: 'http://localhost/php-crud/api/analista/findOne.php/?id=' + $scope.busca.id
            }).then(function (response) {
                $scope.analistaes = [];
                $scope.busca = {};
                $scope.analistaes.push(response.data);
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
            url: 'http://localhost/php-crud/api/analista/findByName.php/?nome=' + $scope.busca.nome
        }).then(function (response) {
            $scope.analistaes = [];
            $scope.busca = {};
            $scope.analistaes.push(response.data);
            console.log(response.data);

        }, function (response) {
        });
    };

    $scope.save = function () {
        url = "http://localhost/php-crud/api/analista/save.php";
        verb = 'POST';
        if ($scope.analista.id != null) {
            url = "http://localhost/php-crud/api/analista/update.php";
            verb = 'PUT';
        }
        console.log($scope.analista)
        $http({
            method: verb,
            url: url,
            data: $scope.analista
        }).then(function (response) {
            $scope.analista = response.data;
            $scope.load();
            alert(response.data.message);
        }, function (response) {

        });
    };

    $scope.excluir = function (id) {
        $http({
            method: 'DELETE',
            url: 'http://localhost/php-crud/api/analista/delete.php/?id=' + id
        }).then(function (response) {
                console.log(response)
                $scope.load();
            }
            , function (response) {
            });

    }

    $scope.alterar = function (analista) {
        $scope.analista = angular.copy(analista);
    };

    $scope.limpar = function () {
        $scope.analista = {};
    };

    $scope.load();

});

