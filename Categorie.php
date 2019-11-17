<?php
$title = "Categorie";
// bovenste bar van de pagina
include 'inc/header.php';
// gelinkte document die de connectie met de database aanlegd
include 'inc/Database-Connectie.php';

?>
<!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <?php
    // Sidebar
    include 'inc/sidebar.php'
    ?>
    <div class="col-8">
        <div class="row">
            <!-- WEBPAGE CONTENT -->
            <?php
            // gegeven uit voorgaande pagina halen
            $group = $_GET["StockGroupID"];
            ?>

            <?php
            // query maken om categorie te tonen die geselecteerd was
            $sqlc = "SELECT * FROM stockgroups WHERE StockGroupID =?";
            $statementc = mysqli_prepare($connect, "SELECT * FROM stockgroups WHERE StockGroupID =?");
            mysqli_stmt_bind_param($statementc, 'i', $group);
            mysqli_stmt_execute($statementc);
            $resultc = mysqli_stmt_get_result($statementc);
            // print categorie naam in <h1> vorm als header
            while ($row = mysqli_fetch_array($resultc, MYSQLI_ASSOC)) {
                $StockGroupName = $row["StockGroupName"];
                print ("<h1>&nbsp" . $StockGroupName . "</h1>");
            }
            ?>
        </div>
        <div class="row">
            <div class="card-group">

                <?php
                //PAGING
                $resultsPerPage = 21;
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                }
                $startFrom = ($page - 1) * $resultsPerPage;
                ?>

                <br> <br> <br>
                <?php
                // query voor het vinden van producten met specifieke categorie
                $sql = "SELECT * FROM stockitems JOIN stockitemstockgroups on stockitems.StockItemID = stockitemstockgroups.StockItemID WHERE stockitemstockgroups.StockGroupID =? LIMIT {$startFrom}, {$resultsPerPage}";
                // vastleggen van de WHERE met de variabel in de link
                $statement = mysqli_prepare($connect, $sql);
                mysqli_stmt_bind_param($statement, 'i', $group);
                mysqli_stmt_execute($statement);
                // resultaat opstellen
                $result = mysqli_stmt_get_result($statement);
                // toont resultaten van voorgaande query
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $ItemID = $row["StockItemID"];
                    $ItemName = $row["StockItemName"];
                    print(" 
<div class='col-4'>    
<div class=\"card\" style=\"width: 18rem;\">
<div class=\"card-body\">
<h5 class=\"card-title\">$ItemName</h5>
<p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
<a href=\"productpagina1.php?StockItemID=$ItemID\" class=\"btn btn-primary\">Go somewhere</a>
</div> 
</div>
</div>
");
                }
                mysqli_free_result($result);
                ?>
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
                print("</ul></nav>")
                ?>

            </div>
        </div>
    </div>
</div>

<?php
// onderste kant van de pagina: klantenservice etc
include 'inc/footer.php';
?>
