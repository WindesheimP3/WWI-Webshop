<?php
session_start();
$title = "Categorie";
// bovenste bar van de pagina
include 'inc/header.php';
// gelinkte document die de connectie met de database aanlegd
include 'sql-statements/Database-Connectie.php';

?>
<!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <?php
    // Sidebar
    include 'inc/sidebar.php';
    ?>
    <div class="col-10">
            <?php
            include "inc/Regels.php";
            ?>
        <div class="row">
            <!-- WEBPAGE CONTENT -->
            <?php
            //Variabele header met categorie-naam
            $group = $_GET["StockGroupID"];
            include "inc/paging-categorie/paging-start.php";
            include "sql-statements/catagorie/SQL-categorieNaam.php";
            while ($row = mysqli_fetch_array($resultc, MYSQLI_ASSOC)) {
                $StockGroupName = $row["StockGroupName"];
                print ("<h1>&nbsp" . $StockGroupName . "</h1>");
            }
            ?>
        </div>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6">
                <?php
                $StockGroupID = $_GET['StockGroupID'];
                ?>
                <form style="text-align:center;" method="get" action="categorie.php">
                    <select name="resultsPerPage">
                        <option selected disabled> -- select products per page --</option>
                        <option value="30">30 products</option>
                        <option value="60">60 products</option>
                        <option value="90">90 products</option>
                    </select>
                    <select name="order">
                        <option selected disabled>-- sort by --</option>
                        <option value="StockItemName">Name</option>
                        <option value="UnitPrice ASC">Price low - high</option>
                        <option value="UnitPrice DESC">Price high - low</option>
                    </select>
                    <input type="hidden" name="StockGroupID" value="<?php print($StockGroupID); ?>">
                    <input type="submit" name="submit" value="Search"><br>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="card-group">
                <?php
                include "sql-statements/catagorie/SQL-productPerCategorie.php";
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $ItemID = $row["StockItemID"];
                    $ItemName = $row["StockItemName"];
                    $price = $row["RecommendedRetailPrice"];
                    print(" 
<div class='col-4'>    
<div class=\"card\" style=\"width: 18rem;\" id='Productvak'>
<div class=\"card-body\">
<h5 class=\"card-title\">$ItemName</h5>
<p class=\"card-text\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc urna, convallis a dictum quis. </p>
<p id='prijs' class='col text-center'>Now only €".number_format($price * 1.21, 2) ."</p>
<a href=\"productpagina1.php?StockItemID=$ItemID\" class=\"btn btn-primary col\" id='Productknop'>Go to product!</a>
</div> 
</div>
</div>  
");
                }
                ?>

            </div>
        </div>
        <div class="row">
            <h5>&nbsp &nbsp &nbsp</h5>
            <?php
            include "inc/paging-categorie/paging-navbar.php";
            include "sql-statements/database-Sluit.php";
            ?>
        </div>
    </div>
</div>

<?php
// onderste kant van de pagina: klantenservice etc
include 'inc/footer.php';
?>
