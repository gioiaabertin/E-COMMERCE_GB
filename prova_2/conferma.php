<?php
include('ckconn.php');
$msg = $_GET["id"];
// Mostra uno script di conferma
echo '<script type="text/javascript">
              var answer = confirm("Sei sicuro di voler eliminare l.elemento ' . $msg . '?");
              if (!answer) {
                  window.location.href = "home.php";
              } else {
                  window.location.href = "canc.php?msg=' . $msg . '";
              }
         </script>';


?>