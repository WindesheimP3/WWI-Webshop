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
    <div class="col-9">
        <?php
        include "inc/Regels.php";
        ?>
        <div>
            <h1>Explore our deals!</h1>
            <div class="row">
                <div class="card-group" id="test">
                    <?php
                    include 'sql-statements/Database-Connectie.php';

                    $sql = "SELECT * FROM stockitems ORDER BY RAND() LIMIT 4";
                    $result = mysqli_query($connect, $sql);
                    print ("<br> <br>");
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $ItemName = $row["StockItemName"];
                        $ItemID = $row["StockItemID"];
                        $price = $row["RecommendedRetailPrice"];
                        print(" 
                    <div class='col-3'>    
                    <div class=\"card\" style=\"width: 18rem;\" id='Productvak'>
                    <div class=\"card-body\">
                    <h5 class=\"card-title\">$ItemName</h5>
                    <p class=\"card-text\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc urna, convallis a dictum quis. </p>
                    <p id='prijs' class='col text-center'>Now only €" . number_format($price * 1.21, 2) . "</p>
                    <a href=\"productpagina1.php?StockItemID=$ItemID\" class=\"btn btn-primary col\" id='Productknop'>Go to product!</a>
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

