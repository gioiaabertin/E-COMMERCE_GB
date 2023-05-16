<?php
include 'DatabaseClassSingleton.php';
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$msg = "";

if (isset($_COOKIE['car']))
    $cookie_value = $_COOKIE['car'] ;
else
    $cookie_value = "";

setcookie("carG", $cookie_value, time() + (86400 * 30), "/");
$id = $_POST["this_user"];
$pw = md5($_POST["this_pw"]);
$query = "SELECT * FROM utenti WHERE user = ? AND pw= ?";
$params = ["ss", &$id, &$pw];
$results = DatabaseClassSingleton::getInstance()->Select($query, $params);


if (count($results) == 1) {
    foreach ($results as $row) {
        $_SESSION["idU"] = $row['id'];

        if ($row['amm'] == 1)
            $_SESSION['amm'] = true;
        include_once 'creacarrello.php';
    }

    header("location: index.php?msg=benvenuto!");

} else {
    $msg = "login errato";
    header("location: index.php?msg=" . $msg);
}

?>