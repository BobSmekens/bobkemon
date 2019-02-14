<?php
session_start();
$_SESSION['offset'] = 721;

header('location: ../index.php?offset=' . $_SESSION['offset']);
?>