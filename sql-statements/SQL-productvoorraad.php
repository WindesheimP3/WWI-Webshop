<?php
$nummer1 = 1;

$sqlinformatie = "SELECT QuantityPerOuter FROM stockitems WHERE StockItemID=?";

$statement1 = mysqli_prepare($connect, $sqlinformatie);
mysqli_stmt_bind_param($statement1, 'i', $nummer1); // i= integer; s = string
mysqli_stmt_execute($statement1);
$result1 =mysqli_stmt_get_result($statement1);

while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
    $naam1 = $row1["QuantityPerOuter"];
    print($naam1 . "<br>");
}
