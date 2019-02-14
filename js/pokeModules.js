const pokeApp = angular.module("pokeApp", [`ngRoute`]);

pokeApp.config(function($routeProvider) {
  $routeProvider
    .when('/', {
      controller: myCtrl,
      templateUrl: 'pokemonlist.html'
    })
    .when(`/pokemon/:id`, {
      //controller:
      template: 'index.html'
    })
    .otherwise({
      redirectTo: `/`
    });
  });