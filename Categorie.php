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
            <div class="card-group">
                <?php
                include "sql-statements/catagorie/SQL-productPerCategorie.php";
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $ItemID = $row["StockItemID"];
                    $ItemName = $row["StockItemName"];
                    print(" 
<div class='col-4'>    
<div class=\"card\" style=\"width: 18rem;\">
<div class=\"card-body\">
<h5 class=\"card-title\">$ItemName</h5>
<p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
<a href=\"productpagina1.php?StockItemID=$ItemID\" class=\"btn btn-primary\">Bekijk product!</a>
</div> 
</div>
</div>
");
                }
                ?>
                <div class="row">
                    <?php
                include "inc/paging-categorie/paging-navbar.php";
                include "sql-statements/database-Sluit.php";
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// onderste kant van de pagina: klantenservice etc
include 'inc/footer.php';
?>
