<?php
session_start();
$title = "Home";
include 'inc/header.php';
?>
<!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <?php
    // Sidebar
    include 'inc/sidebar.php'
    ?>
    <div class="col-10">
        <?php
        include "inc/Regels.php";
        if (!empty($_POST)){
        $POST = array_flip($_POST);
        include "func/cart.php";
        AddToCart($POST['Add one to cart']);
        Header("LOCATION: shopping-cart.php");
        exit;
        }
        ?>
        <div>
            <h1>Explore our deals!</h1>
            <div class="row">
                <div class="card-group" id="test">
                    <?php
                    include 'sql-statements/Database-Connectie.php';

                    $sql = "SELECT * FROM stockitems ORDER BY RAND() LIMIT 3";
                    $result = mysqli_query($connect, $sql);
                    print ("<br> <br>");
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $ItemName = $row["StockItemName"];
                        $StockItemID = $row["StockItemID"];
                        $price = $row["RecommendedRetailPrice"];
                        include "sql-statements/search-result/SQL-ProductFoto.php";
                        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
                            $path= $row2["ImgPath"];
                        }
                        print(" 
                    <div class='col-4'>    
                    <div class=\"card h-100 w-100\" style=\"width: 18rem;\" id='Productvak'>
                    <div class=\"card-body\">
                    <h5 class=\"card-title\">$ItemName</h5>
                    <img class=\"card\" id='Productvak' src='$path' height='350px' width='350px'>
                    <p id='prijs' class='col text-center'>Now only €" . number_format($price * 1.21, 2) . "</p>
                    <a href=\"productpagina1.php?StockItemID=$StockItemID\" class=\"btn btn-primary col\" id='Productknop'>Go to product!</a>
                    <form method='post' action='index.php'>
<input type='submit' name='$StockItemID' value='Add one to cart' class ='btn btn-success col' id='Productknop2'>
</form>
                    </div> 
                    </div>
                    </div>  
                    ");
                        ?>


                        <?php
                    }
                    include 'inc/footer.php';
                    ?>
                </div>
            </div>

