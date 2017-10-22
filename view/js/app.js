/**
 * Created by Samuel on 17/06/2017.
 */
var app = angular.module("app", ['ngRoute']);

app.config(function ($routeProvider, $locationProvider) {
    $routeProvider.when("/hobby",
        {
            templateUrl: 'php-crud/view/register/hobby.html',
            controller: 'hobbyController'
        }).when("/analista",
        {
            templateUrl: 'php-crud/view/register/analista.html',
            controller: 'analistaController'
        }).when("/programador",
        {
            templateUrl: 'php-crud/view/register/programador.html',
            controller: 'programadorController'
        });

    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });
});
