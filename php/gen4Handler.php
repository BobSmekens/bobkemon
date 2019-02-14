<?php
session_start();
$_SESSION['offset'] = 386;

header('location: ../index.php?offset=' . $_SESSION['offset']);
?>