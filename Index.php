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
        <h1>Explore our deals!</h1>
        <br>
        <div class="row" id="Regels">
            <div class="col text-center">
                <b>Ordered before</b>
                <b class="Lorum">24:00</b>
                <b>pm,</b>
                <b class="Lorum">next workday</b>
                <b>delivered</b>
            </div>
            <div class="col text-center">
                <b>Customerservice</b>
                <b class="Lorum">24/7</b>
            </div>
            <div class="col text-center">
                <b class="Lorum">Free</b>
                <b>shipping on orders above</b>
                <b class="Lorum">€50</b>
            </div>
        </div>
    </div>

    <?php
    include 'inc/footer.php';
    ?>
