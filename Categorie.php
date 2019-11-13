<?php
    $title = "Categorie";
<<<<<<< Updated upstream
    include 'inc/header.php';
=======
    // bovenste bar van de pagina
    include 'inc/header.php';
    // gelinkte document die de connectie met de database aanlegd
>>>>>>> Stashed changes
    include 'inc/Database-Connectie.php';

?>
<!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <?php
<<<<<<< Updated upstream
    // Sidebar
=======
    // Sidebar om naar andere categoriëen te kijken
>>>>>>> Stashed changes
    include 'inc/sidebar.php'
    ?>
    <div class="col-8">
        <!-- WEBPAGE CONTENT -->

        <?php
<<<<<<< Updated upstream
=======
        // gegeven uit voorgaande pagina halen
>>>>>>> Stashed changes
        $group=$_GET["StockGroupID"];
        ?>

        <?php
<<<<<<< Updated upstream
=======
        // query maken om categorie te tonen die geselecteerd was
>>>>>>> Stashed changes
        $sqlc = "SELECT * FROM stockgroups WHERE StockGroupID =?";
        $statementc = mysqli_prepare($connect,"SELECT * FROM stockgroups WHERE StockGroupID =?");
        mysqli_stmt_bind_param($statementc, 'i', $group);
        mysqli_stmt_execute($statementc);
        $resultc = mysqli_stmt_get_result($statementc);
<<<<<<< Updated upstream
=======
        // print categorie naam in <h1> vorm als header
>>>>>>> Stashed changes
        while ($row = mysqli_fetch_array($resultc, MYSQLI_ASSOC)) {
            $StockGroupName = $row["StockGroupName"];
            print ("<h1>" . $StockGroupName . "</h1>");
        }
        ?>

        <br> <br> <br>
        <?php
<<<<<<< Updated upstream
        $sql = "SELECT * FROM stockitems JOIN stockitemstockgroups on stockitems.StockItemID = stockitemstockgroups.StockItemID WHERE stockitemstockgroups.StockGroupID =?";
        $statement = mysqli_prepare($connect, "SELECT * FROM stockitems JOIN stockitemstockgroups on stockitems.StockItemID = stockitemstockgroups.StockItemID WHERE stockitemstockgroups.StockGroupID =?");
        mysqli_stmt_bind_param($statement, 'i', $group);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
=======
        // query voor het vinden van producten met specifieke categorie
        $sql = "SELECT * FROM stockitems JOIN stockitemstockgroups on stockitems.StockItemID = stockitemstockgroups.StockItemID WHERE stockitemstockgroups.StockGroupID =?";
        // vastleggen van de WHERE met de variabel in de link
        $statement = mysqli_prepare($connect, "SELECT * FROM stockitems JOIN stockitemstockgroups on stockitems.StockItemID = stockitemstockgroups.StockItemID WHERE stockitemstockgroups.StockGroupID =?");
        mysqli_stmt_bind_param($statement, 'i', $group);
        mysqli_stmt_execute($statement);
        // resultaat opstellen
        $result = mysqli_stmt_get_result($statement);
        // toont resultaten van voorgaande query
>>>>>>> Stashed changes
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $ItemID = $row["StockItemID"];
        $ItemName = $row["StockItemName"];
        print("Productcode &nbsp" . $row["StockItemID"] . ": &nbsp" . $row["StockItemName"] . "<br>");}
        mysqli_free_result($result);
        ?>

        <?php
        ?>

    </div>
</div>

<?php
<<<<<<< Updated upstream
=======
// onderste kant van de pagina: klantenservice etc
>>>>>>> Stashed changes
include 'inc/footer.php';
?>
