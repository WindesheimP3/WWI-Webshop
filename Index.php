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
        <h1>Ontdek onze winkel</h1>
        <br>
        <div class="row" id="Regels">
            <div class="col text-center">
                <b>Voor</b>
                <b class="Lorum">24:00</b>
                <b>besteld,</b>
                <b class="Lorum">Volgende werkdag</b>
                <b>in huis</b>
            </div>
            <div class="col text-center">
                <b class="Lorum">24/7</b>
                <b>Klantenservice</b>
            </div>
            <div class="col text-center">
                <b class="Lorum">Gratis</b>
                <b>bezorging</b>
                <b>bij aankopen boven</b>
                <b class="Lorum">50 Euro</b>
            </div>
        </div>
    </div>

    <?php
    include 'inc/footer.php';
    ?>
