<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include_once 'DatabaseClassSingleton.php';


$msg = "Utente registrato correttamente";
if($_SESSION['amm']==1&&isset($_SESSION['amm'])){
$query = "INSERT INTO utenti(nome, descr, quantitaManc, idCateg, prezzo, foto, taglie, sesso) VALUES (?,?,?,?,?,?,?,?)";
    $params = [
        "ssiiisss", $_POST["this_nome"], $_POST["this_desc"], $_POST["this_quantM"],
        $_POST["this_cat"], 
        $_POST["this_prezzo"] ,$_POST["this_taglie"] ,$_POST["this_sex"]
    ];
    foreach ($params as $p)
        echo $p . '</br>';
    $results = DatabaseClassSingleton::getInstance()->Insert($query, $params);

}
print_r($results);
if ($result == false) {
    $msg = "inserimento NON avvenuto!";
    header("location: accedi.php" . ($msg == "" ? "" : "?msg=$msg"));
} else
    header("location: index.php" . $msg);

?>