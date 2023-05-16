<?php 
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include_once 'DatabaseClassSingleton.php';



if (isset($_SESSION['idU'])) {
    $query = "SELECT amm FROM utenti WHERE id = ? ";
    $params = ["i", &$_SESSION['idU']];
    $results = DatabaseClassSingleton::getInstance()->Select($query, $params);


    if (count($results) == 1) {
        foreach ($results as $row) {
            if ($row['amm'] == 1)
                $_SESSION['amm'] = true;
            else
                $_SESSION['amm'] = false;
        }


    }
} else
    $_SESSION['amm'] = false;

if ($_SESSION['idU'] == 0)
    $_SESSION['amm'] = false;

?>