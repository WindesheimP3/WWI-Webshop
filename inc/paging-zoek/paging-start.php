<?php
$resultsPerPage = 21;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$startFrom = ($page - 1) * $resultsPerPage;
?>