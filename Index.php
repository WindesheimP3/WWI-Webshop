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
        </div>
    </div>

    <?php
    include 'inc/footer.php';
    ?>
