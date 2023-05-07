<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include_once 'DatabaseClassSingleton.php';
if (isset($_SESSION['idU'])) {

    $query = "SELECT * FROM carrelli WHERE idCar=(SELECT MAX(idCar) FROM carrelli WHERE idUtente = ? )";
    $params = ["i", &$_SESSION['idU']];
    $result = DatabaseClassSingleton::getInstance()->Select($query, $params);
    //header("location:shop.php");
    
    if ($result['0']['idCar'] !="" || $result['0']['idCar'] != null) {
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

    } else if ($result['0']['idCar'] == "" || $result['0']['idCar'] == null) { //crea nuovo()
        $query = "INSERT INTO carrelli(idUtente) VALUES (?)";
        $params = ["i", &$_SESSION['idU']];
        $results = DatabaseClassSingleton::getInstance()->Insert($query, $params); //aggiunge carrello nuovo 
       // print_r($results);

        if ($results > 0) {
            $msg = 'avvenuto hai un carrello ora!';
            $cookie_name = "car";
            $cookie_value = $results;
        }
    }
 
//echo $msg;
//echo $cookie_name.','. $cookie_value;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    //header("location: index.php?msg=" . $msg);
   // echo $_COOKIE['car'];
} else {
    $_SESSION['idU'] = 0; //sei un guest
    header('location:"creacarrello.php"');
}
?>