<?php
$sqlc = "SELECT * FROM stockgroups WHERE StockGroupID =?";
$statementc = mysqli_prepare($connect, "SELECT * FROM stockgroups WHERE StockGroupID =?");
mysqli_stmt_bind_param($statementc, 'i', $group);
mysqli_stmt_execute($statementc);
$resultc = mysqli_stmt_get_result($statementc);
?>