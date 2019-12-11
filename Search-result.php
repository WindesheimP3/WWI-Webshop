<?php
session_start();
$title = "Search Results";
include 'inc/header.php';
include 'sql-statements/database-connectie.php';
?>
    <!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
    <div class="row">
<?php
// Sidebar
include 'inc/sidebar.php';
include 'inc/paging-zoek/paging-start.php';
?>
    <!-- WEBPAGE CONTENT -->
    <div class="col">
        <?php
        include "inc/Regels.php";
        ?>
        <div class="row">
            <h1>&nbsp Search results</h1>
        </div>
        <div class="row">
            <!-- Order by en Result per page filtreren -->
            <?php
            $name = $_GET['name'];
            ?>
            <div class="col-6"></div>
            <div class="col-6">
                <form style="text-align:center;" method="get" action="search-result.php">
                    <select name="resultsPerPage" id="Sorteer">
                        <option selected disabled> -- select products per page --</option>
                        <option value="30">30 products</option>
                        <option value="60">60 products</option>
                        <option value="90">90 products</option>
                    </select>
                    <select name="order" id="Sorteer">
                        <option selected disabled>-- sort by --</option>
                        <option value="StockItemName">Name</option>
                        <option value="UnitPrice ASC">Price low - high</option>
                        <option value="UnitPrice DESC">Price high - low</option>
                    </select>
                    <input type="hidden" name="StockGroupID" value="<?php print($StockGroupID); ?>">
                    <input type="submit" name="submit" value="Search" id="Sorteer"><br>
                </form>
            </div>
        </div>
        <!-- zoekresultaten ophalen -->
        <div class="row">
            <?php
            if (isset($_GET['submit'])) { //kijken of het gesubmit kan worden
                if (preg_match("/^([A-Za-z0-9]+)/", $_GET['name'])) {
                    include "sql-statements/search-result/SQL-search.php";
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $SIname = $row['StockItemName'];
                            $StockItemID = $row['StockItemID'];
                            $price = $row["UnitPrice"];
                            include "sql-statements/search-result/SQL-ProductFoto.php";
                            while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
                                $path= $row2["ImgPath"];
                            }
                            print (" 
<div class='col-4 productcard'>    
<div class=\"card w-100 h-100\" id='Productvak'>
<div class=\"card-body\">
<h5 class=\"card-title\" id='Productnaam'>$SIname</h5>
<img class=\"card\" id='Productvak' src='$path' height='350px' width='350px'>
<p id='prijs' class='col text-center'>Now only €" . number_format($price * 1.21, 2) . "</p>
<a href=\"productpagina1.php?StockItemID=$StockItemID\" class=\"btn btn-primary col\" id='Productknop'>Go to product!</a>
</div> 
</div>
</div>
");
                        }
                    } else {
                        print ("<h3> &nbsp No Results found <br>
                                    &nbsp Try searching a different term. </h3>");
                    }
                }
            }


            ?>
        </div>
        <div class="row">
            <h5>&nbsp &nbsp &nbsp</h5>
            <?php
            include "inc/paging-zoek/paging-navbar.php"
            ?>
        </div>
        <br><br>
    </div>

<?php
include "sql-statements/database-Sluit.php";
?>
<?php
include 'inc/footer.php';
?>