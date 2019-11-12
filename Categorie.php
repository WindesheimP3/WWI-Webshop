<?php
    $title = "Categorie";
    include 'inc/header.php';
    include 'inc/Database-Connectie.php';

?>
<!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <?php
    // Sidebar
    include 'inc/sidebar.php'
    ?>
    <div class="col-8">
        <!-- WEBPAGE CONTENT -->

        <?php
        $group=$_GET["StockGroupID"];
        ?>

        <?php
        $sqlc = "SELECT * FROM stockgroups WHERE StockGroupID =?";
        $statementc = mysqli_prepare($connect,"SELECT * FROM stockgroups WHERE StockGroupID =?");
        mysqli_stmt_bind_param($statementc, 'i', $group);
        mysqli_stmt_execute($statementc);
        $resultc = mysqli_stmt_get_result($statementc);
        while ($row = mysqli_fetch_array($resultc, MYSQLI_ASSOC)) {
            $StockGroupName = $row["StockGroupName"];
            print ("<h1>" . $StockGroupName . "</h1>");
        }
        ?>

        <br> <br> <br>
        <?php
        $sql = "SELECT * FROM stockitems JOIN stockitemstockgroups on stockitems.StockItemID = stockitemstockgroups.StockItemID WHERE stockitemstockgroups.StockGroupID =?";
        $statement = mysqli_prepare($connect, "SELECT * FROM stockitems JOIN stockitemstockgroups on stockitems.StockItemID = stockitemstockgroups.StockItemID WHERE stockitemstockgroups.StockGroupID =?");
        mysqli_stmt_bind_param($statement, 'i', $group);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
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
include 'inc/footer.php';
?>
