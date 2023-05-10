<?php
include 'header.php';
include_once 'Cproduct.php';
//include_once 'cksessio.php';

?>

<!DOCTYPE html>
<html lang="en">


<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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


<?php
$prodotti = array();
$prodotti = unserialize($_SESSION['prodotti']);
$i = $_GET['id'];

// ricerca dell'oggetto con l'id corretto
foreach ($prodotti as $p) {
    if ($p->getId() == $i) {
        // l'oggetto è stato trovato
        $oggetto_trovato = $p; // o $indice se vuoi sapere l'indice nell'array
        break;
    }

}
$query = "SELECT * FROM prodotti WHERE id = ? ";
$params = ["s", &$i];
$results = DatabaseClassSingleton::getInstance()->Select($query, $params);
foreach ($results as $row){
    $quantmax=$row['quantitaManc'];
    $taglie=explode(";",$row['taglie']);
    
}
$query = "SELECT * FROM foto WHERE idP = ? ";
$params = ["s", &$i];
$results = DatabaseClassSingleton::getInstance()->Select($query, $params);
$j=0;
foreach ($results as $row) {
  
    $foto[$j]= $row['foto'];  
    $j++;
  }
print_r($foto);
?>

<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="assets/img/product_single_10.jpg" alt="Card image cap"
                        id="product-detail">
                </div>


                <form action="aggPinC.php" method="post">
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                            data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="./imm/<?php echo $foto[0]; ?>.jpg"
                                                    alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="./imm/<?php echo $foto[1]; ?>.jpg"
                                                    alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="./imm/<?php echo $foto[2]; ?>.jpg"
                                                    alt="Product Image 3">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_04.jpg"
                                                    alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_05.jpg"
                                                    alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_06.jpg"
                                                    alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_07.jpg"
                                                    alt="Product Image 7">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_08.jpg"
                                                    alt="Product Image 8">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="assets/img/product_single_09.jpg"
                                                    alt="Product Image 9">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Third slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
            </div>
            <!-- col end -->

            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">
                            <?php echo $oggetto_trovato->getNome() ?>
                        </h1>
                        <p class=" h3 py-2">$
                            <?php echo $oggetto_trovato->getPrezzo() ?>
                        </p>
                        <p class="py-2">
                            <?php
                            $idtemp = $oggetto_trovato->getId();
                            $i = 0;
                            $result =
                                DatabaseClassSingleton::getInstance()->Select('SELECT AVG(stelle) as media_stelle FROM
                                commenti where idProd=?', ["i", &$idtemp]);
                            foreach ($result as $row) {
                                $nstelle = $row["media_stelle"];
                                for ($j = 0; $j < $nstelle; $j++) {
                                    echo ' <i class="text-warning fa fa-star"></i>';
                                    $i = $i + 1;
                                }
                            }
                            echo '</li></ul>';

                            for ($j = $i; $j = 5 - $i; $i++) {

                                echo '<i class="fa fa-star text-secondary"></i>';
                            } ?>
                        </p>
                        <span class="list-inline-item text-dark">

                            <a href="#c&s">aggiungi un commento</a>
                        </span>
                        </p>
                        <ul class=" list-inline">
                            <li class="list-inline-item">
                                <h6>Brand:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>MADE GB</strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p>
                            <?php echo $oggetto_trovato->getDescr() ?>
                        </p>
                        <!-- <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Color :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>White / Black</strong></p>
                            </li>
                        </ul>-->

                        <h6>Specification:</h6>
                        <ul class="list-unstyled pb-3">
                            <li>
                                <?php echo $oggetto_trovato->getDescr() ?>
                            </li>
                        </ul>

                        <form action="" method="GET">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">
                                    <label>Taglie:</label><select name="taglie">
                                        <option disabled selected>Scegli la tua taglia:</option>
                                        <?php foreach ($taglie as $t)
                                        echo "<option value='".$t."'> $t
                                        </option>";
                                        
                                        ?>
                                    </select>
                                </div>
                                <script>

                                </script>
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <div class="product-quantity">
                                            <span>Quantity:</span>
                                            <div class="product-quantity-slider">
                                                <input id="product-quantity" value="1" type="number" min="1"
                                                    max="<?php echo  $quantmax?>" name="quantity">
                                            </div>
                                        </div>
                                    </ul>

                                </div>
                            </div>

                            <div class="row pb-3">

                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit"
                                        value="addtocard">Add To
                                        Cart</button>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>
    <div>
        <h1 id="c&s">COMMENTI&STELLINE</h1>
        <?php if ($_SESSION['idU'] == 0 || !isset($_SESSION['idU']))
            echo "devi fare l'accesso per potere commentare! clicca <a href='accedi.php'>qui</a>";
        else {
            echo '<form action="agCom.php" + ' . $oggetto_trovato->getId() . ' method="post">

        <label>Dai un voto a ' . $oggetto_trovato->getNome() . ':</label><select name="rating">
            <option disabled selected>Seleziona la valutazione</option>
            <option value="1">&#9733;</option>
            <option value="2">&#9733;&#9733;</option>
            <option value="3">&#9733;&#9733;&#9733;</option>
            <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
            <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
        </select>
        <br>
        <label>Descrizione&Motivazioni:
        </label>

        <textarea placeholder="Aggiungi il tuo commento"></textarea><br>
        <input style="float: right;" type="button" value="AGGIUNGI IL MIO PARERE">
        </form>';
        }
        ?>
    </div>
</section>
<!-- Close Content -->




<!-- Start Slider Script -->
<script src=" assets/js/slick.min.js"></script>
<script>
$('#carousel-related-product').slick({
    infinite: true,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 3,
    dots: true,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 3
            }
        }
    ]
});
</script>
<!-- End Slider Script -->
<?php include 'footer.php';
include 'script.php'; ?>
</body>



</html>