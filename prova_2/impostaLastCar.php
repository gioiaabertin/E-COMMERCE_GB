<?php
if (session_status() != PHP_SESSION_ACTIVE) {
include_once session_start();}
include 'DatabaseClassSingleton.php';


$msg = "";


$id = $_GET['id'];
$query = "SELECT * FROM utenti join carrelli WHERE user =?";
$params = ["s", $id];
$results = DatabaseClassSingleton::getInstance()->Select($query, $params);

if ($results>0)
{
    $lastResult = end($results);  
    $_SESSION['car'] =$lastResult ['idCar'];
}
else header('location:"creacarrello.php?id='.$id.'"')
?>