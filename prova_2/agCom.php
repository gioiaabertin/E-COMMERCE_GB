<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include_once 'DatabaseClassSingleton.php';

$idP=$_SESSION["PCommID"];
$rating=$_GET['rating'];
$comm=$_GET['TDesc'];
$title= $_GET['TText'];

echo $rating.$comm;
$query = "INSERT INTO commenti(idUtente,idProd,stelle,titolo,descr) VALUES (?,?,?,?,?)";
$params = ["iiiss", $_SESSION["idU"], $_SESSION["PCommID"], $rating,$title, $comm];
$results = DatabaseClassSingleton::getInstance()->Insert($query, $params);


$msg="Avvenuto con successo! COntinua a fare shopping";
if ($results == false) {
$msg = "inserimento NON avvenuto!";
header("location: index.php" . ($msg == "" ? "" : "?msg=$msg"));
} else
header("location: shop.php" . $msg);

?>