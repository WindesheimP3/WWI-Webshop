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
        ?>
        <div class="container">
            <div class="row">
                <h2><?php print($ItemName) ?></h2><br>
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col-*-*">
                    <img src="img/img_lights.jpg" style="width: 500px; height: 300px;">
                    <div class="col-*-*" style="padding-left: 0; padding-top: 10px;">
                    <p><?php if ($row["MarketingComments"] != null) {
                            print ("Nice to know: $MarketingComments<br>");
                        }
                        }
                        ?>
                    </p>
                    </div>
                </div>
                <div class="col-*-*" style="padding: 10px;">
                    <p>Recommended price: €<?php print($RecommendedRetailPrice) ?></p>
                    <p>Our price: €<?php print($UnitPrice) ?></p>
                    <p>Weight: <?php print($TypicalWeightPerUnit) . "kg" ?></p>
                    <p>
                        <?php if ($row["Size"] != null) {
                            print ("Size: $ItemSize <br>");
                        } ?>
                    </p>
                </div>
            </div>
        </div>
                <?php
                include "sql-statements/database-Sluit.php";
                include 'inc/Footer.php';
                ?>
