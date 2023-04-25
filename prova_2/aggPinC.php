<?php 
//aggiungi prodotto al carrello 

include 'header.php';
include 'conn.php';

    if(!isset($_POST['q']))
    $q=1;
    else $q=$_POST['q'];
 
    $query = "INSERT INTO carrello(idProdotto,idCarello,quant)";
    $params = ["iii",$_POST["idP"], $_SESSION["car"],$q];
    $results = DatabaseClassSingleton::getInstance()->Insert($query, $params);

   

if ($results==false) {
    $msg = "inserimento NON avvenuto!"; //sistemato la logica (la tua era ridondante nelle chiamate)

      header("location: error-carrello.php". ($msg == "" ? "" : "?msg=$msg"));
} else
    header("location: shop-single.html" . ($msg == "" ? "" : "?msg=$msg"));
  

?>