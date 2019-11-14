<?php
$title = "banaan";
include 'inc/header.php';
include 'inc/database-connectie.php';
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
        if(isset($_GET['submit'])) { //kijken of het gesubmit kan worden
            if (preg_match("/^([A-Za-z0-9]+)/", $_GET['name'])) {
                $name = $_GET['name']; //verbinden met database
                $name1 = $name;
                $sql = ("SELECT StockItemName, StockItemID 
                            FROM stockitems 
                            WHERE StockItemName LIKE '%{$name1}%' 
                            OR StockItemID LIKE '%{$name1}%' 
                            OR SearchDetails LIKE '%{$name1}%' 
                            OR MarketingComments LIKE '%{$name1}%' 
                            ORDER BY StockItemID");
                $statement = mysqli_prepare($connect, $sql);
                mysqli_stmt_bind_param($statement, "ss", $name1, $name1);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);
                while ($row = mysqli_fetch_array($result)) {
                    $SIname = $row['StockItemName'];
                    $SIID = $row['StockItemID'];
                    print "<li>" . "<a  href=\"search.php?id=\">" . "Productcode " . $SIID . " - " . $SIname . "</a></li>";
                    print ("</ul>");
                }
            }
        }
        ?>
    </div>
</div>

<?php
include 'inc/footer.php';
?>
