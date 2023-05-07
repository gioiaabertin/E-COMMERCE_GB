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

    <form action="ckaccedi.php" method="post">
        <h1>Accedi</h1>
        <br>
        <p>user: </p>
        <input type="user" name="this_user"><br>
        <p>password: </p>
        <input type="password" name="this_pw">
        <br>
        <input type="submit" value="accedi">
        <h1>Per registrarsi cliccare <a href="registrati.php">qui</a></h1><br>
    </form>

    <?php include 'footer.php'; ?>



</body>

</html>