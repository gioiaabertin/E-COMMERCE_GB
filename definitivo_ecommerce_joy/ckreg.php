<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include_once 'DatabaseClassSingleton.php';

$fields = ['this_nome', 'this_cognome', 'this_user', 'this_mail', 'this_cell', 'this_pw', 'this_pw2', 'this_ncarta', 'this_scad'];
$isEmpty = false;

foreach ($fields as $field) {
    if (empty($_POST[$field])) {
        $isEmpty = true;
        break;
    }
}

if ($isEmpty) {
    $msg ="Per favore, completa tutti i campi del modulo.";
    header("location: registrati.php?msg=".$msg);
} 

$msg="Utente registrato correttamente";

if ($_POST["this_pw"] == $_POST["this_pw2"]) {
   
    $query = "INSERT INTO utenti(nome,cognome,user,mail,cell,pw,ncarta) VALUES (?,?,?,?,?,?,?)";
    $params = ["ssssisi",$_POST["this_nome"], $_POST["this_cognome"],$_POST["this_user"],
    $_POST["this_mail"],$_POST["this_cell"],md5($pw),$_POST["this_ncarta"]/*,$_POST["this_scad"]*/];
    foreach($params as $p) echo $p.'</br>';   
    $results = DatabaseClassSingleton::getInstance()->Insert($query, $params);

}
print_r($results);
if($result==false) {
    $msg = "inserimento NON avvenuto!";
    header("location: registrati.php" . ($msg == "" ? "" : "?msg=$msg"));
} else
    header("location: index.php?msg=".$msg);

?>