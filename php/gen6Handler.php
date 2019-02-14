<?php
session_start();
$_SESSION['offset'] = 649;

header('location: ../index.php?offset=' . $_SESSION['offset']);
?>