<?php
session_start();
include 'conn.php';
$msg="Utente registrato correttamente";

if ($_POST["this_pw"] == $_POST["this_pw2"]) {
    $pw = $_POST["this_pw"];

    $_SESSION["this_u"] = $_POST["this_user"];

    $query = "INSERT INTO utenti(nome,cognome,user,mail,cell,pw,ncarta,scadenzac)";
    $params = ["ssssisis",$_POST["this_nome"], $_POST["this_cognome"],$_POST["this_user"],
    $_POST["this_mail"],$_POST["this_cell"],md5($pw),$_POST["this_ncarta"],$_POST["this_scad"]];
    $results = DatabaseClassSingleton::getInstance()->Insert($query, $params);

}
if($result==false) {
    $msg = "inserimento NON avvenuto!";
    header("location: index.php" . ($msg == "" ? "" : "?msg=$msg"));
} else
    header("location: index.php".$msg);

?>