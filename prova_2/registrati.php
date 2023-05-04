<?php include_once 'header.php';

include_once 'DatabaseClassSingleton.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/f.css">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>

<body>
    <div>
        <form action="ckreg.php" method="post">
            <h1>Registrati</h1>
            <br>
            <p>nome: </p>
            <input type="text" name="this_nome">
            <p>cognome: </p>
            <input type="text" name="this_cognome">
            <p>user: </p>
            <input type="text" name="this_user">
            <p>mail: </p>
            <input type="mail" name="this_mail">
            <p>cellulare: </p>
            <input type="text" name="this_cell">
            <p>password: </p>
            <input type="password" name="this_pw">
            <br>
            <p>ripeti password: </p>
            <input type="password" name="this_pw2">
            <br>
            <p>numero carta: </p>
            <input type="text" name="this_ncarta">
            <p>scadenza carta: </p>
            <input type="date" name="this_scad" value="2023-04-30" min="2023-04-30" max="2029-12-31">


            <input type="submit" value="registrati">
        </form>
    </div>
    <div><?php include 'footer.php' ?> </div>
</body>

</html>