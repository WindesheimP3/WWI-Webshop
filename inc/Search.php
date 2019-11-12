<form method="post" action="search-result.php"  id="searchform">
    <input type="text" name="name">
    <input  type="submit" name="submit" value="Search">
</form>
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

