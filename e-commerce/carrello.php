<?php 
//aggiungi prodotto al carrello 

include 'header.php';
include 'conn.php';

$_SESSION["this_u"] = $_POST["this_user"];
    $sql = "INSERT INTO utenti(nome,cognome,user,mail,cell,pw,ncarta,scadenzac)";
    $sql = $sql . "VALUES (?,?,?,?,?,?,?,?)";

    $stmt->bind_param("ssssisis",$_POST["this_nome"], $_POST["this_cognome"],$_POST["this_user"],$_POST["this_mail"],$_POST["this_cell"],md5($pw),$_POST["this_ncarta"] );
    $stmt->execute();
    $stmt->store_result();
    $result =$stmt->get_result();
}
if (!$conn->query($sql)) {
    $msg = "inserimento NON avvenuto!"; //sistemato la logica (la tua era ridondante nelle chiamate)

    header("location: index.php" . ($msg == "" ? "" : "?msg=$msg"));
} else
    header("location: index.php");

?>






?>