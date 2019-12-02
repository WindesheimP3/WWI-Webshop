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
            <div class="col"></div>
            <div class="col-6">
                <?php
                $POST = array_flip($_POST);
                if (isset($POST['Remove'])){
                    $DeleteID = $POST['Remove'];
                    unset($_SESSION['cart'][$DeleteID]);
                    if (empty($_SESSION['cart'])){
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
                            print("<br><div class='row align-items-center'><div class='col'>$StockItemName </div><div class='col text-center'>Amount: $Quantity</div>
<div class='col text-right'><font color=\"green\">€" . number_format($UnitPrice * $Quantity * 1.21, 2, '.', ',') . "</font></div><div class='çol'><form action='shopping-cart.php' method='post'><input class='btn btn-danger btn-small' type='submit' name='$StockItemID' value='Remove'></input></form></div></div><hr>");

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
                        Subtotal (exl): €<?php print(number_format($TotalPriceExl, 2)) ?> <br>
                        Subtotal (incl): €<?php print(number_format($TotalPriceInc, 2)) ?><br>
                        Shipping Cost: <?php if($TotalPriceInc <50){print("€3.95");} else {print("<font color=\"green\">Free</font>");} ?>
                        <hr>
                        <h2><font color="green"><?php if ($TotalPriceInc != 0){ print("Total: €");}else{print("Donate: €");} if($TotalPriceInc <50){print(number_format($TotalPriceInc + 3.95, 2));} else {print(number_format($TotalPriceInc, 2));} ?></font></h2>
                        <button type="button" class="btn btn-success btn-lg btn-block">Proceed to checkout</button>
                            <a type="button" class="btn btn-danger btn-lg btn-block" href="ShoppingCartDestroy.php">Empty shopping cart</a>
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
