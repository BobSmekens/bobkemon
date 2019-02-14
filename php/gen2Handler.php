<?php
session_start();
$_SESSION['offset'] = 150;

header('location: ../index.php?offset=' . $_SESSION['offset']);
?>