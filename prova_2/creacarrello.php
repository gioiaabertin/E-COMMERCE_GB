<?php
if (!isset($_SESSION)) {
    session_start();
}

$id = $_GET['id'];
$idcarr = 0;
$falg=0;
$query = "SELECT MAX(id) FROM carrelli WHERE idUtente = ? AND pagato=?";
$params = ["i", $id,$flag];
$result = DatabaseClassSingleton::getInstance()->Select($query, $params);

if (count($result) == 1)
    $idcarr = $result++;

$query = "INSERT INTO carrelli(idUtente)";
$params = ["i", $_SESSION['idU']];
$results = DatabaseClassSingleton::getInstance()->Insert($query, $params);
$msg ='avvenuto hai un carrello ora!';
if ($result == false) {
    $msg = "inserimento NON avvenuto!";
    header("location: shop.php" . ($msg == "" ? "" : "?msg=$msg"));
} else
{
    $query = "SELECT MAX(id) FROM carrelli WHERE idUtente = ? AND pagato=?";
    $params = ["i", $id, $flag];
    $result = DatabaseClassSingleton::getInstance()->Select($query, $params);
    $_SESSION['car']=$result['id'];
    header("location: shop.php");

}
    ?>