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
            if (!empty($_POST)){
                $POST = array_flip($_POST);
                include "func/cart.php";
                AddToCart($POST['Add one to cart']);
                Header("LOCATION: shopping-cart.php");
                exit;
            }
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
                <div class="row">
                    <div class="card-deck">
                <?php
                include "sql-statements/catagorie/SQL-productPerCategorie.php";
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $StockItemID = $row["StockItemID"];
                    $ItemName = $row["StockItemName"];
                    $price = $row["RecommendedRetailPrice"];
                    include "sql-statements/catagorie/SQL-ProductFoto.php";
                    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
                        $path= $row2["ImgPath"];
                    }
                    print("    
    <div class='col-4 productcard'>
<div class=\"card w-100 h-100\" id='Productvak'>
<div class=\"card-body\">
<h5 class=\"card-title\" id='Productnaam'>$ItemName</h5>
<img class=\"card\" id='Productvak' src='$path' height='350px' width='350px'>
<p id='prijs' class='col text-center'>Now only €".number_format($price * 1.21, 2) ."</p>
<a href=\"productpagina1.php?StockItemID=$StockItemID\" class=\"btn btn-primary col\" id='Productknop'>Go to product!</a>
<form method='post' action='Categorie.php?StockGroupID=$StockGroupID'>
<input type='submit' name='$StockItemID' value='Add one to cart' class ='btn btn-success col' id='Productknop2'>
</form>
</div> 
</div>
</div>
");
                }
                ?>
                </div>
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


<?php
// onderste kant van de pagina: klantenservice etc
include 'inc/footer.php';
?>
