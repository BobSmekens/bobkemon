<?php
session_start();
$_SESSION['offset'] = 494;

header('location: ../index.php?offset=' . $_SESSION['offset']);
?>