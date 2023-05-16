<?php include 'header.php';
include_once 'Cproduct.php';
include_once 'DatabaseClassSingleton.php';
include_once 'creacarrello.php';
include_once 'ckamm.php';
if (isset($_GET['msg']))
    echo "<script>alert('" . $_GET["msg"] . "');</script>";

if (isset($_COOKIE['car']))
    echo 'car' . $_COOKIE['car'];
echo 'id' . $_SESSION['idU'];

?>
<!DOCTYPE php>
<php lang="en">

    <head>
        <title>joy shop</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/templatemo.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <!-- Load fonts style after rendering the layout styles -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    </head>

    <body>
        <!-- Start Banner Hero -->
        <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="./assets/img/banner_img_01.jpg" alt="">
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="h1 text-success"><b>JOY </b> shop</h1>
                                    <h3 class="h2">Tiny and Perfect eCommerce Template</h3>
                                    <p>
                                        Zay Shop is an eCommerce php5 CSS template with latest version of Bootstrap
                                        5
                                        (beta
                                        1).
                                        This template is 100% free provided by <a rel="sponsored" class="text-success"
                                            href="https://templatemo.com" target="_blank">TemplateMo</a> website.
                                        Image credits go to <a rel="sponsored" class="text-success"
                                            href="https://stories.freepik.com/" target="_blank">Freepik Stories</a>,
                                        <a rel="sponsored" class="text-success" href="https://unsplash.com/"
                                            target="_blank">Unsplash</a> and
                                        <a rel="sponsored" class="text-success" href="https://icons8.com/"
                                            target="_blank">Icons 8</a>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="./assets/img/banner_img_02.jpg" alt="">
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left">
                                    <h1 class="h1">Proident occaecat</h1>
                                    <h3 class="h2">Aliquip ex ea commodo consequat</h3>
                                    <p>
                                        You are permitted to use this Zay CSS template for your commercial websites.
                                        You are <strong>not permitted</strong> to re-distribute the template ZIP
                                        file in
                                        any
                                        kind of template collection websites.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="./assets/img/banner_img_03.jpg" alt="">
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left">
                                    <h1 class="h1">Repr in voluptate</h1>
                                    <h3 class="h2">Ullamco laboris nisi ut </h3>
                                    <p>
                                        We bring you 100% free CSS templates for your websites.
                                        If you wish to support TemplateMo, please make a small contribution via
                                        PayPal
                                        or
                                        tell your friends about our website. Thank you.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
                role="button" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
                role="button" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
        <!-- End Banner Hero -->


        <!-- Start Categories of The Month -->
        <section class="container py-5">
            <div class="row text-center pt-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Categories of The Month</h1>
                    <p>
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
            <div class="row">
                <?php
                $result = DatabaseClassSingleton::getInstance()->Select('SELECT * FROM categorie');
                foreach ($result as $row) {
                    echo ' <div class="col-12 col-md-4 p-5 mt-3">
                    <a href="#"><img src="./imm/' . $row['fotoC'] . '.jpg" class="rounded-circle img-fluid border"></a>
                    <h5 class="text-center mt-3 mb-3">' . $row["nomeC"] . '</h5>
                    <p class="text-center"><a href="shop.php?f='.$row['idC'].'" class="btn btn-success">Go Shop</a></p>
                </div>';
                }
                ?>
            </div>
        </section>
        <!-- End Categories of The Month -->
        <section class="bg-light">
            <div class="container py-5">
                <div id="evid" class="row text-center py-3">
                    <div class="col-lg-6 m-auto">
                        <h1 class="h1">IN EVIDENZA</h1>
                        <p>
                            Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident.
                        </p>
                    </div>
                </div>
                <div class="row">

                    <?php
                    $prodotti = array();
                    $result = DatabaseClassSingleton::getInstance()->Select('SELECT * FROM prodotti where inEvid=1');
                    foreach ($result as $row) {

                        $p = new CProduct($row['id'], $row['nome'], $row['descr'], $row['quantitaManc'], $row['idCateg'], $row['prezzo'], $row['taglie']);
                        array_push($prodotti, $p);
                    }
                    $_SESSION['prodotti'] = $prodotti;
                    ?>
                    <?php
                        $prodotti = $_SESSION['prodotti'];

                        for ($i = 0; $i < count($prodotti); $i++) {
                            echo '
<div class="col-12 col-md-4 mb-4">
                                        <div class="card h-100">
                                            <a href="shop-single.phpshop-single.phpid=' . $prodotti[$i]->getId() . '">
                                                <img src="./assets/img/feature_prod_01.jpg" class="card-img-top"
                                                    alt="...">
                                            </a>
                                            <div class="card-body">
                                                <ul class="list-unstyled d-flex justify-content-between">
                                                    <li>';
                            $idtemp = $prodotti[$i]->getId();

                            $result =
                                DatabaseClassSingleton::getInstance()->Select('SELECT AVG(stelle) as media_stelle FROM
                        commenti where idProd=?', ["i", &$idtemp]);
                            foreach ($result as $row) {
                                $nstelle = $row["media_stelle"];
                                for ($j = 0; $j < $nstelle; $j++) {
                                    echo ' <i class="text-warning fa fa-star"></i>';
                                }
                            }
                            echo '</li>
                                                    <li class="text-muted text-right">$' . $prodotti[$i]->getprezzo() . '</li>
                                                </ul>
                                                <a href="shop-single.phpid=' . $prodotti[$i]->getId() . '" class="h2 text-decoration-none text-dark">
                                                ' . $prodotti[$i]->getNome() . '</a>
                                                <p class="card-text">
                                                   ' . $prodotti[$i]->getdescr() . '
                                                </p>
                                                <p class="text-muted">Reviews (' . rand(100, 3000) . ')</p>
                    </div>
                </div>
            </div> ';


                        } ?>
                </div>
            </div>
            </div>



            <?php include 'footer.php';
            include 'script.php'; ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous">
            </script>
    </body>

</php>