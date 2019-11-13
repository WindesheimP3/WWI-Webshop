<?php
$nummer = 1;

$sql = "SELECT StockItemName FROM stockitems WHERE StockItemID=?";

$statement = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($statement, 'i', $nummer); // i= integer; s = string
mysqli_stmt_execute($statement);
$result =mysqli_stmt_get_result($statement);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $naam = $row["StockItemName"];
    print($naam . "<br>");
}
