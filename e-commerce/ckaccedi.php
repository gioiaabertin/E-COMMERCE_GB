<?php
session_start();
include 'conn.php';


$msg = "";

//se l'user non è tutti caratteri => msg = messaggio errore

$sql = "SELECT * FROM utenti WHERE user =? AND pw =?";
$result = $conn->query($sql);

$stmt->bind_param("ss",$_POST["this_user"],  md5($_POST["this_pw"]));//erorre
$stmt->execute();
//$stmt->store_result();
$result =$stmt->get_result();
if ($result->num_rows == 1/* && $msg == ""*/) {
    $_SESSION["uID"] = $row["id"];

} else
    $msg = "login errato";


    header("location: shop.php?msg=" . $msg);

?>