<?php
$name = $_GET['name']; //verbinden met database
$name1 = "%$name%";
$sql = ("SELECT StockItemName, StockItemID
FROM stockitems
WHERE StockItemName LIKE ?
OR StockItemID = ?
OR SearchDetails LIKE ?
OR MarketingComments LIKE ?
ORDER BY StockItemID");
$statement = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($statement, 'siss', $name1, $name, $name1, $name1);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
?>