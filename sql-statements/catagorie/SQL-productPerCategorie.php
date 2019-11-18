<?php
$sql = "SELECT * FROM stockitems JOIN stockitemstockgroups on stockitems.StockItemID = stockitemstockgroups.StockItemID WHERE stockitemstockgroups.StockGroupID =? LIMIT {$startFrom}, {$resultsPerPage}";
// vastleggen van de WHERE met de variabel in de link
$statement = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($statement, 'i', $group);
mysqli_stmt_execute($statement);
// resultaat opstellen
$result = mysqli_stmt_get_result($statement);
// toont resultaten van voorgaande query
?>