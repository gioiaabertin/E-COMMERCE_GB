<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nome del tuo Ecommerce</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css"
    integrity="sha512-izVjIbTfT7dCifQ2laxxVZnBfZSSsVpGmXuXzBWeEtTbTbnr7ljrmbMFW1f7WT1IyOuV7ePvv0XuHFlWgz62zA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-fLf5+L8f6EnDyvSMD+YyrFyDsU8ds6UJZ6m05j4UQXmwdG6szBneOoOJ6Wz1vK4UheMk4kp4bgU6+jNUfc6hng=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Custom CSS -->
<link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navbar -->

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">ecommerce_gb</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="logout.php">Prodotti</a>
                </li>
                <li class="active">
                    <a href="logout.php">Carrello</a>
                </li>
                <li class="active">
                    <a href="logout.php">Contatti</a>
                </li>
                <li class="active">
                    <a href="logout.php">LOG IN</a>
                </li>
                <?php
                if(isset($_SESSION["idU"]))
                    echo "<li class='active'><a href='logout.php'>LOG OUT</a></li>";
                    else
                    echo "<li class='active'><a href='accedi.php'>LOG IN</a></li>";

                    ?>


            </ul>
        </div>
    </nav>


    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Benvenuti nel nostro ecommerce!</h1>
            <p class="lead">Acquista i migliori prodotti ai prezzi più convenienti.</p>
        </div>
    </div>

    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Prodotti in evidenza</h2>
                <p>Qui potresti inserire una lista dei tuoi prodotti in evidenza, oppure una descrizione generale del
                    tuo ecommerce.</p>
            </div>
            <div class="col-md-4">
                <h2>Carrello</h2>
                <p>Qui potresti inserire il contenuto del carrello dell'utente