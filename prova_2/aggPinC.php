<?php if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();}
//aggiungi prodotto al carrello 
include 'creacarrello.php';
include 'header.php';
include 'conn.php';

    if(!isset($_POST['q']))
    $q=1;
    else $q=$_POST['q'];

    $query = "INSERT INTO carrellocarica(idProdotto,idCarello,quant) values (?,?,?)";
    
    $params = ["iii",&$_GET['id'], &$_COOKIE["car"],&$q];
    
    $results = DatabaseClassSingleton::getInstance()->Insert($query, $params);

   

if ($results==false) {
    $msg = "inserimento NON avvenuto!"; //sistemato la logica (la tua era ridondante nelle chiamate)

      header("location: error-carrello.php". ($msg == "" ? "" : "?msg=$msg"));
} else
    header("location: shop-single.html" . ($msg == "" ? "" : "?msg=$msg"));
  

?>