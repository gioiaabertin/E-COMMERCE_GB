<?php
include 'DatabaseClassSingleton.php';
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$msg = "";

//se l'user non è tutti caratteri => msg = messaggio errore
$id = $_POST["this_user"];
$pw = md5($_POST["this_pw"]);
$query = "SELECT * FROM utenti WHERE user = ? AND pw= ?";
$params = ["ss", $id, $pw];
$results = DatabaseClassSingleton::getInstance()->Select($query, $params);


if (count($results) == 1) {
    foreach ($results as $row)
        $_SESSION["idU"] = $row['id'];

    if (!isset($_COOKIE['car']))
        header("location: creacarrello.php");
    else
        header("location: index.php?msg=benvenuto!");

} else {
    $msg = "login errato";
    header("location: shop.php?msg=" . $msg);
}

?>