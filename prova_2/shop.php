<?php
include 'header.php';
include 'CProduct.php';
include_once 'DatabaseClassSingleton.php';
//include_once 'cksessio.php';

if (isset($_GET["msg"]))
    echo "<script>alert('" . $_GET["msg"] . "');</script>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Joy Shop - Product Listing Page</title>
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
</head>

<body>


    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Gender
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Men</a></li>
                            <li><a class="text-decoration-none" href="#">Women</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Sale
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Sport</a></li>
                            <li><a class="text-decoration-none" href="#">Luxury</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Product
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Bag</a></li>
                            <li><a class="text-decoration-none" href="#">Sweather</a></li>
                            <li><a class="text-decoration-none" href="#">Sunglass</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="#">Women's</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Featured</option>
                                <option>A to Z</option>
                                <option>Item</option>
                            </select>
                        </div>
                    </div>
                </div>

                <?php
                $prodotti = array();
                $result = DatabaseClassSingleton::getInstance()->Select('SELECT * FROM prodotti');
                foreach ($result as $row) {
                   
                    $p = new CProduct($row['id'], $row['nome'], $row['descr'],$row['quantitaManc'],$row['idCateg'],$row['prezzo'],$row['taglie']);
                    array_push($prodotti,$p);
                }
                   $_SESSION['prodotti'] = $prodotti;
                ?> <div class="row">
                    <?php
                                 $prodotti=$_SESSION['prodotti'];
                                 
                                 for( $i=0;$i<count($prodotti);$i++){
               echo'
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/shop_01.jpg">
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="cuori.php?id=' . $prodotti[$i]->getId() . '"><i
                                                    class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php?id=' .$prodotti[$i]->getId(). '"><i
                                                    class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="aggPinC.php?id=' . $prodotti[$i]->getId() . '"><i
                                                    class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">';

                             
                                   echo "<a href='shop-single.php' class='h3 text-decoration-none'>".$prodotti[$i]->getNome() ."</a>";
                                   echo '<ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                   <li>'. $prodotti[$i]->getTaglie() .'</li><li class="pt-2">
                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                    </li>
                    </ul>
                    <ul class="list-unstyled d-flex justify-content-center mb-1" <li> ';
                        $idtemp = $prodotti[$i]->getId();
                        
                        $result =
                        DatabaseClassSingleton::getInstance()->Select('SELECT AVG(stelle) as media_stelle FROM
                        commenti where idProd=?', ["i",&$idtemp]);
                        foreach($result as $row) {
                        $nstelle= $row["media_stelle"];
                        for ($j = 0; $j < $nstelle; $j++) { echo ' <i class="text-warning fa fa-star"></i>' ;}}
                            echo '</li></ul>' ; echo " <p class=' text-center mb-0'>" .$prodotti[$i]->
                            getPrezzo().'$</p>
                </div>
            </div>

        </div>'; }?>
                </div>
            </div>
        </div>
    </div>


    <?php
    include 'footer.php';
    include 'script.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</php>