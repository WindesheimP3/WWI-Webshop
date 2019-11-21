<?php
$sql = "SELECT distinct StockGroupName, st.StockGroupID FROM stockgroups st LEFT JOIN stockitemstockgroups sg ON st.StockGroupID=sg.StockGroupID LEFT JOIN stockitems si ON si.StockItemID=sg.StockGroupID WHERE si.StockItemID IS NOT NULL";
$statement = mysqli_prepare($connect, $sql);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
?>