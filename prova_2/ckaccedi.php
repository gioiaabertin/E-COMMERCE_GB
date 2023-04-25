<?php
include 'DatabaseClassSingleton.php';


$msg = "";

//se l'user non è tutti caratteri => msg = messaggio errore
$id = $_POST["this_user"];
$pw = md5($_POST["this_pw"]);
$query = "SELECT * FROM utenti WHERE id = ? AND pw = ?";
$params = ["ss", $id, $pw];
$results = DatabaseClassSingleton::getInstance()->Select($query, $params);

if (count($results) == 1) {
    $_SESSION["utID"] = $result[0];
    

    header("location: index.php?msg=" . "benvenuto!");
} else
    $msg = "login errato";
    header("location: shop.php?msg=" . $msg);


?>