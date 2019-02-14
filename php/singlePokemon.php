<?php 
if(session_start()){
} else {
    session_start();
};?>
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>bobkemon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.6/angular.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.6/angular-route.js"></script>
    <link rel="stylesheet" href="../../../css/styles.css" type="text/css">
</head>
<body class="singlepokemon-body">
  <div>
<div class="singlepokemonTitle">
  Is this the pokémon for YOUR team?
</div>
<?php
$pokemon = $_GET['name'];

echo '
<div id="hidden-link" style="display:none;">https://pokeapi.co/api/v2/pokemon/' . $pokemon . '/</div>
';
?>
<div class="container-fluid row align-items-end" ng-app="pokeApp" ng-controller="myCtrl">
    <div ng-if="error">
      Sorry, that pokemon does not exist
    </div>

    <div class="col-6">  
      <img id="singlepokemon-img" src={{img}} alt="">
    </div>

    <div class="col-6 singlepokemon-right" id="singlepokemon-right"> 
      
      <div id="poke-name">{{name}}</div>
      <div>Pokedex: {{id}}</div>
      <div>Type: {{type1}} <span ng-if="type2">/ {{type2}}</span></div>
      <div>Ability 1: {{ability1}}</div>
      <div ng-if="ability2">Ability 2: {{ability2}}</div>
    </div>

    <div class="container-fluid row singlepokemon-links">
      <a class="singlepokemon-link-left link-button" href="../../../index.php">Back to main</a>
      <?php 
      echo '<a ng-if="error===NULL" class="singlepokemon-link-right link-button" href="../../addPokeTeamHandler.php?name='.$pokemon.'&id={{id}}&img={{img}}&type1={{type1}}&type2={{type2}}">Add to team</a>';

    ?>
    </div>
      
    </div>  
</div>
<!---------------------scripts----------------------->
<script>

const pokeApp = angular.module("pokeApp", [`ngRoute`]);
var url = document.getElementById("hidden-link").innerHTML;
 
pokeApp.controller('myCtrl', function($scope, $http) {
  $http.get(url)
  .then(function(response) {
      $scope.id = response.data.id;
      $scope.name = response.data.name;
      $scope.type1 = response.data.types[0].type.name;
      if(response.data.types[1]) {
        $scope.type2 = response.data.types[1].type.name;
      };     
      $scope.ability1 = response.data.abilities[0].ability.name;
      if(response.data.abilities[1]){
        $scope.ability2 = response.data.abilities[1].ability.name;
      };
      $scope.img = response.data.sprites.front_default;
      console.log(response.data);
  })
  .catch(function(error) {
    console.log(error);
      $scope.error = error.data;
  });
});
console.log(url);
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
</body>
</html>
