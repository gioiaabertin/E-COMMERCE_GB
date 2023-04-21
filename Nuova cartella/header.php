<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">social_media_gb</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="logout.php">LOG OUT</a>
                </li>

                <?php
                    echo '<li><a href="home.php">tutti gli utenti</a></li>';
                
               ?>
            </ul>
        </div>
    </nav>



</body>

</html>