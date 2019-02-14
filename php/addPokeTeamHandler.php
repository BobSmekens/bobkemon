
<?php 
session_start();
if (isset($_SESSION['poketeam'])){
    $poketeam = $_SESSION['poketeam'];
} else {
    $poketeam = [];
};

$pokename = $_GET['name'];
$pokeid = $_GET['id'];
$img = $_GET['img'];
$type1 = $_GET['type1'];
if(isset($_GET['type2'])){
    $type2 = $_GET['type2'];
} else {
    $type2 = "purebred";
}
//echo $pokename;
$newPokemon = array(
    'id' => $pokeid, 
    'name' => $pokename, 'img' => $img,
    'type1' => $type1, 
    'type2' => $type2
);

if(count($poketeam) >= 6){
    array_pop($poketeam);
};
array_push($poketeam, $newPokemon);

$_SESSION['poketeam'] = $poketeam;
/*
function printPokeTeam($ARRAY){
    for ($i = 0; $i < count($ARRAY); $i++ ) { 
        echo "Index: " . $i;
        echo " Pokemon name: " . $ARRAY[$i].'<br>';
        }
    }
*/
//printPokeTeam($poketeam);
// var_dump($poketeam);
// var_dump($_SESSION['poketeam']);
header('location: ../index.php');
?>
