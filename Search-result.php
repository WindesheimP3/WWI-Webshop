<?php
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
    <div class="col-8">
        <div class="row">
            <h1>&nbsp Search results</h1>
        </div>
        <div class="row">
            <!-- Order by filtreren -->
            <?php
            $name = $_GET['name'];
            ?>
            <div class="col-6"></div>
            <div class="col-6">
                <form style="text-align:center;" method="get" action="search-result.php">
                    <select name="resultsPerPage">
                        <option selected disabled> -- select products per page --</option>
                        <option value="30">30 products</option>
                        <option value="60">60 products</option>
                        <option value="90">90 products</option>
                    </select>
                    <select name="order">
                        <option selected disabled> -- sort by --</option>
                        <option value="StockItemName">Name</option>
                        <option value="UnitPrice ASC">Price low - high</option>
                        <option value="UnitPrice DESC">Price high - low</option>
                    </select>
                    <input type="hidden" name="name" value="<?php print($name); ?>">
                    <input type="submit" name="submit" value="Search"><br>
                </form>
            </div>
        </div>
        <!-- zoekresultaten ophalen -->
        <div class="row">
            <?php
            if (isset($_GET['submit'])) { //kijken of het gesubmit kan worden
                if (preg_match("/^([A-Za-z0-9]+)/", $_GET['name'])) {
                    include "sql-statements/search-result/SQL-search.php";
                    while ($row = mysqli_fetch_array($result)) {
                        $SIname = $row['StockItemName'];
                        $SIID = $row['StockItemID'];
                        print (" 
<div class='col-4'>    
<div class=\"card\" style=\"width: 18rem;\">
<div class=\"card-body\">
<h5 class=\"card-title\">$SIname</h5>
<p class=\"card-text\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc urna, convallis a dictum quis. </p>
<a href=\"productpagina1.php?StockItemID=$SIID\" class=\"btn btn-primary\">Go to product!</a>
</div> 
</div>
</div>
");
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