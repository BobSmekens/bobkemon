<?php 
session_start();


echo $_GET['pokeid']; 
echo "<br>";

$pokeid = $_GET['pokeid'];
$poketeam = $_SESSION['poketeam'];

$array_index = searchForId($pokeid, $poketeam);

var_dump($poketeam);

$poketeam = removeElementFromArray($array_index, $poketeam);

$_SESSION['poketeam'] = $poketeam;

 header("Location: ../index.php");

 function removeElementFromArray($ELEMENT_INDEX, $ARRAY){
    unset($ARRAY[$ELEMENT_INDEX]);
    $ARRAY = array_values($ARRAY);
    return $ARRAY;
 }

 function searchForId($ID, $ARRAY) {       
    foreach ($ARRAY as $key => $val) {      
        if ($val['id'] == $ID) {          
            return $key;                  
        }
    }
    return null;                   
 }
?>