<?php
$title = "banaan";
include 'inc/header.php';
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
        if(isset($_POST['submit'])){ //kijken of het gesubmit kan worden
            if(isset($_GET['go'])){ //kijken of bij de "if" hij met de database matcht
                if(preg_match("/^([A-Za-z]+)/", $_POST['name'])){
                    $name=$_POST['name']; //volgende verbinden met database
                    $name1 = $name;
                    $name2 = $name;
                    $name3 = $name;
                    $database = include ("database-connectie.php");
                    $sql = "SELECT StockItemName, StockItemID, FROM wideworldimporters.stockitems WHERE StockItemName LIKE '%?%' OR StockItemID LIKE '%?%'";
                    $statement = mysqli_prepare($connection, "SELECT StockItemName, StockItemID, FROM wideworldimporters.stockitems WHERE StockItemName LIKE '%?%' OR StockItemID LIKE '%?%'");

                    mysqli_stmt_bind_param($statement, 'sss', $name1, $name2, $name3);
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);
                    while ($row=mysqli_fetch_array($result)){
                        $SIname = $row['StockItemName'];
                        $SIID = $row['StockItemID'];
                        print "<li>" . "<a  href=\"search.php?id=$SIname\">"   .$SIID . "</a></li>";
                        print ("</ul>");
                    }
                }
            }
        }
        ?>
        <h1 class="text-left">Heading 1</h1>
        <p class="text-left">Some text.</p>
        <h2 class="text-left">Heading 2</h2>
        <p class="text-left">Some more text.</p>
    </div>
</div>

<?php
include 'inc/footer.php';
?>