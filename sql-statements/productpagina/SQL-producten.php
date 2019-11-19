<?php
$StockItemID = $_GET['StockItemID'];
$sql = "SELECT * FROM stockitems WHERE StockItemID =?";
$statement = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($statement, 'i', $StockItemID);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
?>
