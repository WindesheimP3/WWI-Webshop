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
    <div class="col-8">
        <!-- WEBPAGE CONTENT -->
        <div class="col-1"></div>
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
            print("$ItemName <br>");
            if ($row["Size"] != null) {
                print ("Size: $ItemSize <br>");
            }
            print ("Weight: $TypicalWeightPerUnit kg <br>");
            print ("Recommended price: €$RecommendedRetailPrice <br>");
            print ("Our price: €$UnitPrice <br>");
            if ($row["MarketingComments"] != null) {
                print ("Nice to know: $MarketingComments <br>");
            }
        }
        ?>

    </div>
</div>

<?php
include "sql-statements/database-Sluit.php";
include 'inc/Footer.php';
?>
