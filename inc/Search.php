<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <title>Webshopnaam</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<p><body>
<form method="post" action="search.php?go"  id="searchform">
    <input type="text" name="name">
    <input  type="submit" name="submit" value="Search">
</form>
<?php
if(isset($_POST['submit'])){ //kijken of het gesubmit kan worden
    if(isset($_GET['go'])){ //kijken of bij de "if" hij met de database matcht
        if(preg_match("^/[A-Za-z]+/", $_POST['name'])){
            $name=$_POST['name']; //volgende verbinden met database
            include ("database-connectie.php");
            $sql = "SELECT StockItemName, StockItemID, FROM wideworldimporters.stockitems WHERE StockItemName LIKE '%" . $name . "%' OR StockItemID LIKE '%" . $name . "%'";
            $result = mysqli_query($sql);
            while ($row=mysqli_fetch_array($result)){
                $SIname = $row['StockItemName'];
                $SIID = $row['StockItemID'];
                print ("<ul>""\n");
                print "<li>" . "<a  href=\"search.php?id=$SIname\">"   .$SIID . "</a></li>" "\n";
                print ("</ul>");
                }
            }
            }
    } else{
        print ("<p>Please enter a search query</p>");
    }
}
?>
</body>
</html>
</p>
