<?php
session_start();
$_SESSION['offset'] = $_SESSION['offset'] - 15;

header('location: ../index.php?offset=' . $_SESSION['offset']);
?>