<?php
$name = $_GET['name']; //verbinden met database
$name1 = "%$name%";
$sql = ("SELECT count(*) AS total
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
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$total_pages = ceil($row["total"] / $resultsPerPage);

print("<nav><ul class=\"pagination\">");
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<li class=\"page-item\"><a class=\"page-link\" href='Search-result.php?name=" . $name . "&submit=Search&page=" . $i . "'";
    if ($i == $page) echo " class='curPage'";
    echo ">" . $i . "</a></li> ";
};
print("</ul></nav>");
?>