<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    include session_start();
}
if(isset($_GET['id']))
    $_SESSION['idU'] = $_GET['id'];

$query = "SELECT MAX(idCar) FROM carrelli WHERE idUtente = ? ";
$params = ["i", $_SESSION['idU']];
$result = DatabaseClassSingleton::getInstance()->Select($query, $params);

if (count($result) == 1) {
    foreach ($result as $row) {
        if ($row['pagato'] == 1) { //se pagato

            $query = "INSERT INTO carrelli(idUtente)";
            $params = ["i", $_SESSION['idU']];
            $results = DatabaseClassSingleton::getInstance()->Insert($query, $params); //aggiunge carrello nuovo 

            if ($results > 0) {
                $msg = 'avvenuto hai un carrello ora!';
                $cookie_name = "car";
                $cookie_value = $result;
            }


        } else if ($row['pagato'] == 0) //se non pgato lo ricarico 
        {
            $msg ='hai il tuo vecchio carello!';
            //domanda lo vuoi tenere o no?
            $cookie_name = "car";
            $cookie_value = $row['idCar'];
        }
    }
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}


if ($result == false) {
    $msg = "inserimento NON avvenuto!";
    
}
header("location: index.php" . ($msg == "" ? "" : "?msg=$msg"));
?>