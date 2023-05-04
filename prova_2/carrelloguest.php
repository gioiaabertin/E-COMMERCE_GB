<?php
if (session_status() == PHP_SESSION_ACTIVE) {
include session_start();}
include 'DatabaseClassSingleton.php';


$msg = "";


$id = 'guest';
$query = "SELECT * FROM utenti as u join carrelli as c WHERE user =?";
$params = ["s", $id];
$results = DatabaseClassSingleton::getInstance()->Select($query, $params);

if ($results>0)
{
    $lastResult = end($results);  
    $_SESSION['car'] =$lastResult ['c.id'];
}
?>