<?php
session_start();
include 'conn.php';


$msg = "";

//se l'user non è tutti caratteri => msg = messaggio errore

$sql = "SELECT * FROM utenti WHERE user =? AND pw =?";
$result = $conn->query($sql);

$stmt->bind_param("ss",$_POST["this_user"],  md5($_POST["this_pw"]));//erorre
$stmt->execute();
//$stmt->store_result();
$result =$stmt->get_result();
if ($result->num_rows == 1/* && $msg == ""*/) {
    $_SESSION["this_u"] = $_POST["this_user"];
 //   $row = $result->fetch_assoc(); //non esisteva $row, perche' in realta' la creavi tu dentro l'if, va creata cosi' o con un while nel caso di piu' record
 
} else
    $msg = "login errato";

if ($msg != "") {
    $_SESSION["autorizzato"]=true;
    header("location: index.php?msg=" . $msg);
}
?>
<!--non va chiusa la connesssione
$conn->close();-->