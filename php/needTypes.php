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
    typesContentString += '<div class="rec-types-wrapper"><img id="type-img" src="img/'+typesLeft[i]+'.png"><div class="recommended-types">' + typesLeft[i] + '</div></div>';
}
typesDiv.innerHTML = typesContentString; 
}
</script>