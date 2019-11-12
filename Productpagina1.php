<?php
$title = "banaan";
include 'inc/Header.php';
?>
<!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <?php
    // Sidebar
    include 'inc/Sidebar.php';
    include 'sql-statements/Database-Connectie.php';
    ?>
    <div class="col-8">
        <!-- WEBPAGE CONTENT -->
        <div class="col-1"></div>
        <p class="text-left"><br> <b><?php
                include 'sql-statements/SQL-productnaam.php';
                ?></b></p>
        <p class="text-left"><b>Prijs</b><br>€<?php
            include 'sql-statements/SQL-productprijs.php'
            ?></p>
        <p class="text-left">Actuele Voorraad: <?php
            include 'sql-statements/SQL-productvoorraad.php'
            ?></p>
        <p class="text-left"><b>Productomschrijving</b><br><?php
            include 'sql-statements/SQL-productinformatie.php';
            ?></p>

    </div>
</div>

<?php
include 'sql-statements/Database-Sluit.php';
include 'inc/Footer.php';
?>
