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
    <div class="col-10">
        <!-- WEBPAGE CONTENT -->
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1 class="text-left">Shopping Cart</h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col-7">
                <?php
                $POST = array_flip($_POST);
                if (isset($POST['Edit Quantity'])) {
                    $EditID = $POST['Edit Quantity'];
                    $_SESSION['cart'][$EditID] = $_POST['EditAmount'];
                    if ($_SESSION['cart'][$EditID] == 0){
                        unset($_SESSION['cart'][$EditID]);
                    }
                    if (empty($_SESSION['cart'])) {
                        unset($_SESSION['cart']);
                    }
                }
                if (isset($_SESSION['cart'])) {
                    include 'sql-statements/database-connectie.php';
                    foreach ($_SESSION['cart'] as $StockItemID => $Quantity) {
                        include "sql-statements/shoppingcart/SQL-ShoppingCart.php";
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $StockItemName = $row["StockItemName"];
                            $UnitPrice = $row["RecommendedRetailPrice"];
                            include 'sql-statements/shoppingcart/SQL-Maxquantity';
                            while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
                                $maxquantity = $row3["QuantityOnHand"];
                            }
                            print("
<br>
<div class='row align-items-center'>
    <div class='col'>
        $StockItemName 
    </div>
        <div class='col text-right'>
        <form action='shopping-cart.php' method='post'>
        <label>Amount:
        <select class=\"custom-select custom-select-sm\" name='EditAmount'>
        <option value='0'>Remove</option>");
             for($i=$Quantity - 5; $i <= $maxquantity and ($i<=10 or $i<=$Quantity + 5);  $i++){
                 if ($i < 1){
                     $i=1;
                 }
                 if ($i == $Quantity){
                     print("<option selected value='$i'>$i</option>");
                 }else {
                     print("<option value='$i'>$i</option>");
                 }
             }
             print ("</select></label></div><div class='col'>
                <input class='btn btn-warning btn-small' type='submit' name='$StockItemID' value='Edit Quantity'>
        </form></div>
    <div class='col text-right'>
        <font color=\"green\">€" . number_format($UnitPrice * $Quantity * 1.21, 2, '.', ',') . "</font>
    </div>
    </div>
    <hr>
    ");

                            $totalprices[] = number_format($UnitPrice * $Quantity, 2, '.', '');
                        }
                    }

                    $TotalPriceExl = number_format(array_sum($totalprices), 2, '.', '');
                    $TotalPriceInc = number_format($TotalPriceExl * 1.21, 2, '.', '');
                } else {
                    print("<br><br><br><br><div class='row h3 text-left align-items-center'><font color='red'>No Items In Shopping Cart</font></div>");
                    $TotalPriceInc = 0;
                    $TotalPriceExl = 0;
                }
                ?>
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col-3">
                <div class="row sticky-top">
                    <div class="col" id="totaalprijs">
                        Subtotal (excl): €<?php print(number_format($TotalPriceExl, 2)) ?> <br>
                        Subtotal (incl): €<?php print(number_format($TotalPriceInc, 2)) ?><br>
                        Shipping Cost: <?php if ($TotalPriceInc < 50 and $TotalPriceInc != 0) {
                            print("€3.95");
                        } else {
                            print("<font color=\"green\">Free</font>");
                        } ?>
                        <hr>
                        <h2><font color="green"><?php if ($TotalPriceInc != 0) {
                                    print("Total: €");
                                } else {
                                    print("Free: €");
                                }
                                if ($TotalPriceInc < 50 and $TotalPriceInc != 0) {
                                    print(number_format($TotalPriceInc + 3.95, 2));
                                } else {
                                    print(number_format($TotalPriceInc, 2));
                                } ?></font></h2>
                        <?php
                        if ($TotalPriceInc != 0) {
                            print("<a  class=\"btn btn-success btn-lg btn-block\" role=\"button\" href=\"Checkout.php\">Proceed to checkout</a>");
                        } else {
                            print("<a  class=\"btn btn-success btn-lg btn-block disabled\"  tabindex=\"-1\" role=\"button\" aria-disabled=\"true\"href=\"\">Proceed to checkout</a>");
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <br>
        <?php

        include 'sql-statements/database-sluit.php';
        include 'inc/footer.php';
        ?>
