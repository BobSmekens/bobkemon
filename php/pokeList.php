<!DOCTYPE html>
<html>
<body>
<?php 

if(isset($_GET['searchfield'])){
  echo $_GET['searchfield'].'
  <div id="hidden-list-link" style="display: none">https://pokeapi.co/api/v2/pokemon/'.$_GET['searchfield'].'/?offset='.$_SESSION['offset'].'&limit=15</div>
';
}

if(isset($_SESSION['offset'])){
  echo'
    <div id="hidden-list-link" style="display: none">https://pokeapi.co/api/v2/pokemon/?offset='.$_SESSION['offset'].'&limit=15</div>
  ';
}
else {
  $_SESSION['offset'] = 0;
  echo '
  <div id="hidden-list-link" style="display: none">https://pokeapi.co/api/v2/pokemon/?offset=0&limit=15</div>
  ';
}
?>
    <div ng-app="pokeApp" ng-controller="myCtrl">
    <form action="php/searchHandler.php" method="GET">
      <input  id="searchbar" type="text" name="searchfield" placeholder="Search">
      <button id="search-btn" type="submit"></button>
    </form>
      
      <div class="own-list-container" ng-repeat="result in results">
        <div class="own-list-item">
          <a href="php/singlePokemon.php/{{result.name}}/?name={{result.name}}"> {{result.name}}</a>
        </div>
      </div>
    </div>
      <?php echo '
        <a class="change-list-link list-link-left link-button" href="php/previousHandler.php">Previous</a>
        <a class="change-list-link list-link-right link-button" href="php/nextHandler.php">Next</a>
        ';
      ?>

<script>

var pokeApp = angular.module("pokeApp", [`ngRoute`]);
var url = document.getElementById("hidden-list-link").innerHTML;

pokeApp.controller('myCtrl', function($scope, $http) {
  
  $http.get(url)
  .then(function(response) {
    $scope.results = response.data.results;
    //console.log(response.data.results)
  });
});

</script>

</body>
</html>
