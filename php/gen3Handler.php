<?php
session_start();
$_SESSION['offset'] = 251;

header('location: ../index.php?offset=' . $_SESSION['offset']);
?>