<?php
session_start();
include 'conn.php';

if ($_POST["this_pw"] == $_POST["this_pw2"]) {
    $pw = $_POST["this_pw"];

    $_SESSION["this_u"] = $_POST["this_user"];
    $sql = "INSERT INTO utenti(nome,cognome,user,mail,cell,pw,ncarta,scadenzac)";
    $sql = $sql . "VALUES (?,?,?,?,?,?,?)";

    $stmt->bind_param("ss",$_POST["this_user"], md5($pw) );
    $stmt->execute();
    $stmt->store_result();
    $result =$stmt->get_result();
}
if (!$conn->query($sql)) {
    $msg = "inserimento NON avvenuto!"; //sistemato la logica (la tua era ridondante nelle chiamate)

    header("location: home.php" . ($msg == "" ? "" : "?msg=$msg"));
} else
    header("location: index.php");

?>