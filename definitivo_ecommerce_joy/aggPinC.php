<?php if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
//aggiungi prodotto al carrello 
include 'creacarrello.php';
include 'conn.php';

if (!isset($_POST['q']))
    $q = 1;
else
    $q = $_POST['q'];
    
if (isset($_GET['id']))
    $idp = $_GET['id'];
else if (isset($_POST['id']))
    $idp = $_POST['id'];

$query = "INSERT INTO carrellocarica(idProdotto,idCarello,quant) values (?,?,?)";

$params = ["iii", &$_GET['id'], &$_COOKIE["car"], &$q];

$results = DatabaseClassSingleton::getInstance()->Insert($query, $params);



if ($results == false)
    $msg = "inserimento NON avvenuto!"; //sistemato la logica (la tua era ridondante nelle chiamate)
else
    $msg = "inserimento avvenuto!";

header("location: shop.php" . ($msg == "" ? "" : "?msg=$msg"));


?>