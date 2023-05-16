<?php 
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$_SESSION["idU"] = 0;
include 'creacarrello.php';
include 'ckamm.php';
header('location:index.php');
?>