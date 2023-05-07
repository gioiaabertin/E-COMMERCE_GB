<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include_once 'DatabaseClassSingleton.php';
 $cookie_value =0;
if (isset($_SESSION['idU'])) {

    $query = "SELECT MAX(idCar) FROM carrelli WHERE idUtente = ? ";
    $params = ["i", &$_SESSION['idU']];
    $result = DatabaseClassSingleton::getInstance()->Select($query, $params);
    //header("location:shop.php");
    if (count($result) == 1) {
        foreach ($result as $row) {
            if ($row['pagato']==1) { //se pagato

                $query = "INSERT INTO carrelli(idUtente) VALUES (?)";
                $params = ["i", &$_SESSION['idU']];
                $results = DatabaseClassSingleton::getInstance()->Insert($query, $params); //aggiunge carrello nuovo 

                if ($results > 0) {
                    $msg = 'pronto per un nuovo aquisto,avvenuto hai un carrello ora!';
                    $cookie_name = "car";
                    $cookie_value = $results;
                }


            } else if ($row['pagato'] == 0) //se non pgato lo ricarico 
            {
                $msg = 'hai il tuo vecchio carello!';
                //domanda lo vuoi tenere o no?
                $cookie_name = "car";
                $cookie_value = $row['idCar'];
            }
        }

    } else if (count($result) != 1) { //crea nuovo
        $query = "INSERT INTO carrelli(idUtente) VALUES (?)";
        $params = ["i", &$_SESSION['idU']];
        $results = DatabaseClassSingleton::getInstance()->Insert($query, $params); //aggiunge carrello nuovo 

        if ($results > 0) {
            $msg = 'avvenuto hai un carrello ora!';
            $cookie_name = "car";
            $cookie_value = $result[count($result)];
        }
    }

    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    header("location: index.php?msg=" . $msg);
} else {
    $_SESSION['idU'] = 0; //sei un guest
    header('location:"creacarrello.php"');
}
?>