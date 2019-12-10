<?php

$sql2 = "SELECT * FROM stockitemimage JOIN image ON stockitemimage.PhotoID = image.PhotoID WHERE stockitemimage.StockItemID =? limit 1";
$statement2 = mysqli_prepare($connect, $sql2);
mysqli_stmt_bind_param($statement2, 'i', $StockItemID);
mysqli_stmt_execute($statement2);
$result2 = mysqli_stmt_get_result($statement2);
