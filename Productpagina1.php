<?php
session_start();
$title = "Product";
include 'inc/Header.php';
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Productpagina-css/slideshow.css" type="text/css">
</head>
<div class="row">
    <?php
    // Sidebar
    include 'inc/Sidebar.php';
    // Database openen
    include 'sql-statements/database-Connectie.php';
    ?>
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
    $TypicalWeightPerUnit = round($TypicalWeightPerUnit, 2);
    ?>
    <div class="col" style="padding: 20px;">
        <div class="row">
            <div class="col">
                <h2><?php print($ItemName) ?></h2><br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="slideshow">
                    <input type="radio" name="ss1" id="ss1-item-1" class="slideshow--bullet" checked="checked"/>
                    <div class="slideshow--item">
                        <a href="https://www.youtube.com/watch?v=V1NJPSZZBsk" target="_blank">
                            <img src="img/img_lights.jpg" style="height: 400px; width: 630px;"/></a>
                        <label for="ss1-item-3" class="slideshow--nav slideshow--nav-previous">Go to slide 3</label>
                        <label for="ss1-item-2" class="slideshow--nav slideshow--nav-next">Go to slide 2</label>
                    </div>
                    <input type="radio" name="ss1" id="ss1-item-2" class="slideshow--bullet"/>
                    <div class="slideshow--item">
                        <img src="img/44554755-private-military-contractor-with-rpg-rocket-launcher-isolated-on-white.jpg" style="height: 400px; width: 630px;"/>
                        <label for="ss1-item-1" class="slideshow--nav slideshow--nav-previous">Go to slide 1</label>
                        <label for="ss1-item-3" class="slideshow--nav slideshow--nav-next">Go to slide 3</label>
                    </div>
                    <input type="radio" name="ss1" id="ss1-item-3" class="slideshow--bullet"/>
                    <div class="slideshow--item">
                        <img src="img/rpg-7-rocket-grenade-launcher-low-poly-game-asset-3d-model-low-poly-obj-mtl-fbx-blend-x3d.jpg" style="height: 400px; width: 630px;"/>
                        <label for="ss1-item-2" class="slideshow--nav slideshow--nav-previous">Go to slide 2</label>
                        <label for="ss1-item-1" class="slideshow--nav slideshow--nav-next">Go to slide 1</label>
                    </div>
                </div>
            </div>
            <div class="col">
                <br><br><br>
                <hr>
                <h2>€<?php print("$RecommendedRetailPrice") ?></h2>
                <p><?php
                    if ($QuantityOnHand > 10) {
                        print ("<font color=\"green\">In stock</font>");
                    } elseif ($QuantityOnHand >= 1 && $QuantityOnHand <= 10) {
                        print ("<font color=\"orange\">Only $QuantityOnHand left</font>");
                    } elseif ($QuantityOnHand == 0) {
                        print ("<font color=\"red\">Out of stock</font>");
                    }
                    ?>
                </p>
                <div class="btn-group cart">
                    <button type="button" class="btn btn-success">Add to cart</button>
                </div>
                <br>
                <hr>
                <p>Weight: <?php print($TypicalWeightPerUnit) . "kg" ?><br>
                    <?php if ($row["Size"] != null) {
                        print ("Size: $ItemSize <br>");
                    } ?>
                    <?php
                    print $Tags;
                    ?>
                </p>
            </div>
        </div>
        <br><br>
        <hr>
        <div class="row">
            <div class="col">
                <h2>Productinformation</h2>
                <p><?php if ($row["MarketingComments"] != null) {
                        print ("Nice to know: $MarketingComments<br>");
                    } else {
                        print ("There is no productinformation about this product.");
                    }
                    }
                    ?>
                </p>
            </div>
            <div class="col">
                <h2>Specs</h2>
            </div>
        </div>
    </div>
</div>
<?php
include "sql-statements/database-Sluit.php";
include 'inc/Footer.php';
?>
