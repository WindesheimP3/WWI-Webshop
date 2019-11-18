<?php
$sql = "SELECT COUNT(stockitems.StockItemID) AS total FROM stockitems JOIN stockitemstockgroups on stockitems.StockItemID = stockitemstockgroups.StockItemID WHERE stockitemstockgroups.StockGroupID =?";
$statement = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($statement, 'i', $group);
mysqli_stmt_execute($statement);
// resultaat opstellen
$result = mysqli_stmt_get_result($statement);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$total_pages = ceil($row["total"] / $resultsPerPage);

print("<nav><ul class=\"pagination\">");
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<li class=\"page-item\"><a class=\"page-link\" href='categorie.php?StockGroupID=" . $group . "&page=" . $i . "'";
    if ($i == $page) echo " class='curPage'";
    echo ">" . $i . "</a></li> ";
};
print("</ul></nav>");
?>