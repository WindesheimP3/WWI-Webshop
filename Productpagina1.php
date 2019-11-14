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
    include 'inc/Database-Connectie.php';
    ?>
    <div class="col-8">
        <!-- WEBPAGE CONTENT -->
        <div class="col-1"></div>
        <?php
        // Selecteer het stockitemID van de catalog pagina
        $StockItemID = $_GET['StockItemID'];
        $sql = "SELECT * FROM stockitems WHERE StockItemID =?";
        $statement = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($statement, 'i', $StockItemID);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $ItemName = $row["StockItemName"];
            $ItemSize = $row["Size"];
            $RecommendedRetailPrice = $row["RecommendedRetailPrice"];
            $UnitPrice = $row["UnitPrice"];
            $MarketingComments = $row["MarketingComments"];
            $TypicalWeightPerUnit = $row["TypicalWeightPerUnit"];
            print("$ItemName <br>");
            if ($row["Size"] != null){
                print ("Size: $ItemSize <br>");
            }
            print ("Weight: $TypicalWeightPerUnit kg <br>");
            print ("Recommended price: €$RecommendedRetailPrice <br>");
            print ("Our price: €$UnitPrice <br>");
            if ($row["MarketingComments"] != null){
                print ("Nice to know: $MarketingComments <br>");
            }
        }
        mysqli_free_result($result);
        ?>

    </div>
</div>

<?php
include 'inc/Footer.php';
?>
