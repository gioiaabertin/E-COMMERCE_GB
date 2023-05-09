<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include_once 'DatabaseClassSingleton.php';

$idP=$_GET["id"];

$query = "INSERT INTO utenti(nome,cognome,user,mail,cell,pw,ncarta) VALUES (?,?,?,?,?,?,?)";
$params = [
"ssssisi", $_POST["this_nome"], $_POST["this_cognome"], $_POST["this_user"],
$_POST["this_mail"], $_POST["this_cell"],
md5($pw), $_POST["this_ncarta"] /*,$_POST["this_scad"]*/
];
foreach ($params as $p)
echo $p . '</br>';
$results = DatabaseClassSingleton::getInstance()->Insert($query, $params);


print_r($results);
if ($result == false) {
$msg = "inserimento NON avvenuto!";
header("location: accedi.php" . ($msg == "" ? "" : "?msg=$msg"));
} else
header("location: index.php" . $msg);

?>