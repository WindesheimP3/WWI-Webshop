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
        $Tags = $row["Tags"];
        ?>
        <div class="container">
            <div class="row" style="padding-top: 10px; padding-left: 10px;">
                <h2><?php print($ItemName) ?></h2><br>
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col-*-*" >
                    <div class="slideshow">
                        <input type="radio" name="ss1" id="ss1-item-1" class="slideshow--bullet" checked="checked"/>
                        <div class="slideshow--item">
                            <img src="img/img_lights.jpg"/>
                            <label for="ss1-item-3" class="slideshow--nav slideshow--nav-previous">Go to slide
                                3</label>
                            <label for="ss1-item-2" class="slideshow--nav slideshow--nav-next">Go to slide 2</label>
                        </div>
                        <input type="radio" name="ss1" id="ss1-item-2" class="slideshow--bullet"/>
                        <div class="slideshow--item">
                            <img src="img/44554755-private-military-contractor-with-rpg-rocket-launcher-isolated-on-white.jpg" style="height: 400px; width: 600px;"/>
                            <label for="ss1-item-1" class="slideshow--nav slideshow--nav-previous">Go to slide
                                1</label>
                            <label for="ss1-item-3" class="slideshow--nav slideshow--nav-next">Go to slide 3</label>
                        </div>

                        <input type="radio" name="ss1" id="ss1-item-3" class="slideshow--bullet"/>
                        <div class="slideshow--item">
                            <img src="img/rpg-7-rocket-grenade-launcher-low-poly-game-asset-3d-model-low-poly-obj-mtl-fbx-blend-x3d.jpg" style="height: 400px; width: 600px;"/>
                            <label for="ss1-item-2" class="slideshow--nav slideshow--nav-previous">Go to slide
                                2</label>
                            <label for="ss1-item-4" class="slideshow--nav slideshow--nav-next">Go to slide 4</label>
                        </div>
                    </div>
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
                    <div class="container" style="padding-top: 50px;">
                        <div class="row">
                            <h2>Productinformation</h2>
                        </div>
                        <div class="row">
                            <p><?php if ($row["MarketingComments"] != null) {
                                    print ("Nice to know: $MarketingComments<br>");
                                } else {
                                    print ("There is no productinformation of this product.");
                                }
                                }
                                ?>
                            </p>
                        </div>
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
