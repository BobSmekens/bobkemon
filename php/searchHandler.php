<?php
if(isset($_GET['searchfield']) && $_GET['searchfield']===null) {
    header('location: ../index.html');
} else {
    header('location: singlePokemon.php/ponyta/?name='.$_GET['searchfield']);
} 
?>
