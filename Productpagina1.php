<?php
$title = "Product";
include 'inc/Header.php';
?>
<!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <?php
    // Sidebar
    include 'inc/Sidebar.php';
    // Database openen
    include 'sql-statements/database-Connectie.php';
    ?>
    <!-- WEBPAGE CONTENT -->
    <link rel="stylesheet" type="text/css" href="Productpagina1.css">
    <div class="col">
        <?php
        // Selecteer het stockitemID van de catalog pagina
        include "sql-statements/productpagina/SQL-producten.php";
        // Hier worden alle verschillende kolommen opgehaald uit de database en weergegeven op de webshop
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $ItemName = $row["StockItemName"];
        $ItemSize = $row["Size"];
        $RecommendedRetailPrice = $row["RecommendedRetailPrice"];
        $UnitPrice = $row["UnitPrice"];
        $MarketingComments = $row["MarketingComments"];
        $TypicalWeightPerUnit = $row["TypicalWeightPerUnit"];
        $QuantityOnHand = $row["QuantityOnHand"];
        ?>
        <div class="container">
            <div class="row" style="padding-top: 10px; padding-left: 10px;">
                <h2><?php print($ItemName) ?></h2><br>
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col-*-*">
                    <img src="img/img_lights.jpg" style="width: 500px; height: 300px;">
                </div>
                <div class="col-*-*" style="padding-left:20px; padding-top: 10px;">
                    <p>Recommended price: €<?php print($RecommendedRetailPrice) ?></p>
                    <p>Our price: €<?php print($UnitPrice) ?></p>
                    <p>Quanity on hand: <?php print ($QuantityOnHand) ?></p>
                    <p>Weight: <?php print($TypicalWeightPerUnit) . "kg" ?></p>
                    <p>
                        <?php if ($row["Size"] != null) {
                            print ("Size: $ItemSize <br>");
                        } ?>
                    </p>
                    <button type="button" class="btn btn-success">In basket</button>
                </div>
                <div class="container" style="padding: 10px;">
                    <div class="row">
                        <h2>Productinformation</h2>
                    </div>
                    <div class="row">
                        <p><?php if ($row["MarketingComments"] != null) {
                                print ("Nice to know: $MarketingComments<br>");
                            }
                            }
                            ?>
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam cursus vitae lacus in
                            pretium.
                            Cras eleifend nulla et tellus aliquam, nec porttitor purus pulvinar. Vivamus eu ex
                            fringilla, ornare est in, tincidunt tortor. Pellentesque at risus ut sapien convallis
                            dapibus. Nunc hendrerit finibus tristique. Phasellus vitae orci sed tellus interdum
                            posuere
                            sit amet eu lectus. Ut at nisi et mi condimentum suscipit. Aenean a augue sagittis,
                            commodo
                            libero quis, sagittis dolor. Mauris lacinia finibus metus. Mauris sed ante quis eros
                            venenatis malesuada. Praesent sit amet velit pretium, semper turpis in, maximus mi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "sql-statements/database-Sluit.php";
include 'inc/Footer.php';
?>
