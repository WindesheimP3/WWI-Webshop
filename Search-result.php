<?php
$title = "banaan";
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
    <div class="col-8">
        <div class="row">
            <h1>&nbsp Zoekresultaten</h1>
        </div>
        <div class="row">
        <!-- WEBPAGE CONTENT -->
        <?php
        if(isset($_GET['submit'])) { //kijken of het gesubmit kan worden
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
<a href=\"productpagina1.php?StockItemID=$SIID\" class=\"btn btn-primary\">Bekijk product!</a>
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
            <h5>
                &nbsp &nbsp
            </h5>
            <?php
            include "inc/paging-zoek/paging-navbar.php"
            ?>
        </div>
    </div>
</div>

<?php
include "sql-statements/database-Sluit.php";
include 'inc/footer.php';
?>
