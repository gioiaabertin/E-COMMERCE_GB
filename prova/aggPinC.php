<?php 
//aggiungi prodotto al carrello 

include 'header.php';
include 'conn.php';

    if(!isset($_POST['q']))
        $q=1;
    $sql = "INSERT INTO carrello(idProdotto,idCarello,quant)";
    $sql = $sql . "VALUES (?,?,?)";

    $stmt->bind_param("iii",/*id,id*/,$q);
    $stmt->execute();
    $stmt->store_result();
    $result =$stmt->get_result();

if (!$conn->query($sql)) {
    $msg = "inserimento NON avvenuto!"; //sistemato la logica (la tua era ridondante nelle chiamate)

    header("location: shop-single.html" . ($msg == "" ? "" : "?msg=$msg"));
} else
    header("location: error-carrello.php");

?>






?>