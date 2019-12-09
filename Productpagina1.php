<?php
session_start();
$title = "Product";
include 'inc/Header.php';
if(isset($_POST['addButton'])) {
    include "func/cart.php";
    AddToCart($_POST["StockItemID"], $_POST["Quantity"]);
}
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Productpagina1.css" type="text/css">
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
    $ItemID = $row["StockItemID"];
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
                    <?php
                    include "sql-statements/productpagina/SQL-foto.php";
                    $i = 1;
                    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                    $ImgPath = $row2["ImgPath"];
                    print("                    <input type=\"radio\" name=\"ss1\" id=\"ss1-item-$i\" class=\"slideshow--bullet\" checked=\"checked\"/>
                    <div class=\"slideshow--item\" id=\"Slideshow\">
                        <img src=\"$ImgPath\"
                             style=\"height: 350px; width: 630px;\"/>");
                    if ($i == 1) {
                        print("
                        <label for=\"ss1-item-3\" class=\"slideshow--nav slideshow--nav-previous\"></label>
                        <label for=\"ss1-item-2\" class=\"slideshow--nav slideshow--nav-next\"></label>
                    </div>");
                    } elseif ($i == 2){
                        print("
                        <label for=\"ss1-item-1\" class=\"slideshow--nav slideshow--nav-previous\"></label>
                        <label for=\"ss1-item-3\" class=\"slideshow--nav slideshow--nav-next\"></label>
                    </div>");
                    } else {
                        print("
                        <label for=\"ss1-item-2\" class=\"slideshow--nav slideshow--nav-previous\"></label>
                        <label for=\"ss1-item-1\" class=\"slideshow--nav slideshow--nav-next\"></label>
                    </div>");
                    }
                    $i++;
                    }
                    ?>

                </div>
            </div>
            <div class="col">
                <br><br><br>
                <hr>
                <div class="row">
                    <div class="col">
                        <h2>€<?php print(number_format($RecommendedRetailPrice * 1.21, 2)) ?></h2>
                    </div>
                    <div class="col">
                        <small>€<?php print("$RecommendedRetailPrice") ?>(excl)</small>
                    </div>
                    <div class="col"></div>
                </div>
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
                <form method="post" action="Productpagina1.php?StockItemID=<?php print($ItemID)?>">
                    <div class="row align-items-center">
                        <div class="col">
                            <button type="submit" class="btn btn-success btn-lg btn-block" id="Koopknop" name="addButton" value="add">Add to cart</button>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="Quantity">Select Quantity</label>
                                <select class="form-control" name="Quantity">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <input type="hidden" name="StockItemID" value="<?php print($ItemID); ?>">
                        </div>
                        <div class="col"> <?php if(isset($_POST['addButton'])){print("<font color=\"green\">Succesful added to cart</font>");} ?></div>
                    </div>
                </form>
                <br>
                <hr>
                <p>
                    <?php if ($row["Size"] != null) {
                        print ("Size: $ItemSize <br>");
                    } ?>
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
                <p>
                    • Weight: <?php print($TypicalWeightPerUnit) . " kg<br>" ?>
                    <?php
                    if ($Tags != '[]') {
                        $Tags = str_replace('"', '', $Tags);
                        $Tags = str_replace('[', '', $Tags);
                        $Tags = str_replace(']', '', $Tags);
                        $Tags = str_replace(',', '<br> • ', $Tags);
                        if ($row["Tags"] != '[""]') {
                            print ('• ' . $Tags);
                        }
                    }
                    ?>
                </p>
            </div>
        </div>
        <br>
    </div>
</div>
<?php
include "sql-statements/database-Sluit.php";
include 'inc/Footer.php';
?>
