<?php
if (isset($_GET["resultsPerPage"])){
    $resultsPerPage = $_GET["resultsPerPage"];
} else {
    $resultsPerPage = 21;
}
if (isset($_GET['result'])){
    $resultsPerPage = $_GET['result'];
} else {
    $order = "ORDER BY StockItemName";
}

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$startFrom = ($page - 1) * $resultsPerPage;
?>