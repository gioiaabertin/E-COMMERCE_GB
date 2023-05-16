<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include_once 'DatabaseClassSingleton.php';

if(isset($_POST["this_nome"])&& isset($_POST["this_desc"])&& isset($_POST["this_quantM"])
        && isset($_POST["this_cat"]) && isset($_POST["this_prezzo"])
       && isset($_POST["this_taglie"]) && isset($_POST["this_sex"])&&$_POST["this_nome"]!=""&& $_POST["this_desc"]!=""&& 
       $_POST["this_quantM"]!=""&& $_POST["this_cat"]!="" && $_POST["this_prezzo"]!=""
       && $_POST["this_taglie"]!="" && $_POST["this_sex"]!=""){

$msg = "Utente registrato correttamente";
if($_SESSION['amm']==1&&isset($_SESSION['amm'])){
$query = "INSERT INTO prodotti(nome, descr, quantitaManc, idCateg, prezzo, taglie, sesso, inEvid) VALUES (?,?,?,?,?,?,?,?)";
    $params = [
        "ssiiissb", &$_POST["this_nome"], &$_POST["this_desc"], 
        &$_POST["this_quantM"],&$_POST["this_cat"], 
        &$_POST["this_prezzo"] ,&$_POST["this_taglie"] ,&$_POST["this_sex"],
           &$_POST["this_cke"]];
    foreach ($params as $p)
        echo $p . '</br>';
    $results = DatabaseClassSingleton::getInstance()->Insert($query, $params);

}
$msg="corretto";
if ($results == false) {
    $msg = "inserimento NON avvenuto!";
    header("location: accedi.php?msg=".$msg);
} else
    header("location: index.php?msg=" . $msg);}
    else { 
        $msg='inserisci tutti i campi correttamente!';
        header("location: AmmAggP.php?msg=".$msg);
    }
   
?>