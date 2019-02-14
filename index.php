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
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body class="indexBody" onload="showRecommended()">
<div class="indexTitle">Bobkémon <br>The pokémon-team-suggest-machine!</div>
<div class="row" ng-app="pokeApp" ng-controller="myCtrl">
    <div class="col-6 poke-list">
        <div class="dashboardTitle">List with all Pokémon</div>
        <?php include "php/pokeList.php"; ?>
    </div>

    <div class="col-6 poke-team">
    <div class="dashboardTitle">My team!</div>

        <?php include "php/poketeam.php"; ?>
    </div>
</div>

<div class="container-fluid row">
    <div class="neededTypesTitle">Oh noo! You don't have these types in your team!?</div>
    <div class="recommendedContainer">
        <div id="neededTypes"></div> 
    </div>
</div>


<script>
function showRecommended() {
var teamTypes = document.getElementsByClassName("teamTypes");
// for(i = 0; i < teamTypes.length; i++){
//     console.log(teamTypes[i].innerHTML);
// }
var allTypes = [
    "normal",
    "fight",
    "flying",
    "poison",
    "ground" ,
    "rock" ,
    "bug", 
    "ghost",
    "steel" ,
    "fire" ,
    "water" ,
    "grass",
    "electric",
    "psychic",
    "ice",
    "dragon",
    "dark" ,
    "fairy"
];
var typesInTeam = [];
var deleteIndexes = [];
var typesDiv = document.getElementById("neededTypes");

for(i = 0; i < teamTypes.length; i++){
    typesInTeam.push(teamTypes[i].innerHTML);
}

///////////////////fill array with indexes to delete/////////
for(i = 0; i < teamTypes.length; i++){
    deleteIndexes.push(allTypes.indexOf(teamTypes[i].innerHTML));
    deleteIndexes.sort();
    //console.log(deleteIndexes);
}
//////////////only indexes of >0 to delete values///////////////
function deleteType(value){
    return value > 0 ;
}

var deleteTypes = deleteIndexes.filter(deleteType);
console.log("types to delete:" +deleteTypes);
/////////////////////splic types out of array//////////////////
// for(i = 0; i < deleteTypes.length; i++){
//     if(deleteTypes[i] > -1){
//     allTypes.splice(deleteTypes[i]-i, 1);
//     }
// }

console.log(typesInTeam);
console.log(allTypes);

///////////////////compared arrays and remove duplicates/////////////
var typesLeft = allTypes.filter(val => !typesInTeam.includes(val));

console.log("types left:" +typesLeft);
/////make string to put in innerHTML (print types values)///
var typesContentString = "";

for(i = 0; i < typesLeft.length; i++){
    typesContentString += '<div class="recommended-types">' + typesLeft[i] + '</div>';
}
typesDiv.innerHTML = typesContentString; 
}
</script>

<!--                scripts for bootstrap------------>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
</body>
</html>