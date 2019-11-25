<?php
session_start();
$title = "Shopping Cart";
include 'inc/header.php';
?>
<!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <?php
    // Sidebar
    include 'inc/sidebar.php'
    ?>
    <div class="col">
        <!-- WEBPAGE CONTENT -->
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1 class="text-left">Shopping Cart</h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <br>
                [image] Name
                <br>
                <hr>
                <br>
                Item
                <br>
                <hr>
                <br>
                Item
                <br>
                <hr>
                <br>
                Item
                <br>
                <hr>
                <br>
                Item
                <br>
                <hr>
                <br>
                Item
                <br>
                <hr>
                <br>
                Item
                <br>
                <hr>
                <br>
                Item
                <br>
                <hr>
                <br>
                Item
                <br>
                <hr>
                <br>
                Item
                <br>
                <hr>
                <br>
                Item
                <br>

            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col-3">
                <div class="row sticky-top">
                    <div class="col" id="border">
                        Subtotal (exl): €154,- <br>
                        Subtotal (incl): €176,-<br>
                        Shipping Cost: €3.95
                        <hr>
                        Total: €179.95
                        <button type="button" class="btn btn-success btn-lg btn-block">Proceed to checkout</button>
                    </div>
                </div>
            </div>
            <div class="col"></div>

        </div>
        <br>
        <?php
        include 'inc/footer.php';
        ?>
