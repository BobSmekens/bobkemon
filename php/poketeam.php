<div class="poke-team-container" ng-module="pokeApp" ng-controller="myCtrl">
<?php 
//////////////////////hidden link///////////////////
echo '
<div class="hidden-team-link" style="display:none;">https://pokeapi.co/api/v2/pokemon/blastoise/</div>
';
if (isset($_SESSION['poketeam'])){
    $poketeam = $_SESSION['poketeam'];
//var_dump($poketeam);

function printPokeTeam($ARRAY){
    for ($i = 0; $i < count($ARRAY); $i++ ) { 
//        echo "Index: " . $i;
        echo '<div class="poketeam-member">
        <div><img class="poketeamImage" src='.$ARRAY[$i]['img'].' alt="not found"></div>

        <a class="poketeam-pokemon" href="php/singlePokemon.php/'.$ARRAY[$i]['id'].'/?name='.$ARRAY[$i]['name'].'">'.$ARRAY[$i]['name'].'</a>
        <div class="teamTypes">'. $ARRAY[$i]['type1'] .'</div>
        <div class="teamTypes">'. $ARRAY[$i]['type2'].'</div>
        <a class="poketeam-delete" href="php/delete-item.php?pokeid='.$ARRAY[$i]['id'].'">Delete</a>
        </div>';
        }
    }
    // <span><img class="poketeamImage" src={{img}} alt="not found"></span>
 //<span class="poketeam-img"><img src={{img}}></span>

printPokeTeam($poketeam);

} else {
    $poketeam = [];
};

echo '<br><a id="clear-team-link" class="link-button" href="php/clearTeam.php">clear team</a>';
?>
</div>

<script>

var poketeamNames = [];
var pokeImages = [];
var teamurl = document.getElementsByClassName("hidden-team-link")[0].innerHTML;
var poketeamDivs = document.getElementsByClassName("poketeam-pokemon");
var poketeamImage = document.getElementsByClassName("poketeamImage");

const pokeTeam = angular.module("pokeApp", [`ngRoute`]);
pokeTeam.controller('myCtrl', function($scope, $http) {
  $http.get(teamurl)
  .then(function(response) {
      $scope.img = response.data.sprites.front_default;
      //console.log(response.data);
  })
  .catch(function(error) {
    //console.log(error);
      $scope.error = error.data;
  });
  $http.get(url)
  .then(function(response) {
    $scope.results = response.data.results;
    //console.log(response.data.results)
  });
});

//console.log("poketeam members: " + poketeamNames);
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
