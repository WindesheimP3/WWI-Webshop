<?php
session_start();
include "inc/Header.php";
?>
    <!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
    <div class="row">
<?php
// Sidebar
include 'inc/sidebar.php'
?>
<?php
require "mollie/initialize.php";
$payment = $mollie->payments->get($_SESSION["paymentID"]);
$paymentarray = json_decode(json_encode($payment),true);
if ($paymentarray['status'] == 'paid') {

    ?>
    <div class="col-10">
    <!-- WEBPAGE CONTENT -->
    <div class="row">
        <div class="col"></div>
        <div class="col-10">
            <h1 class="text-left">You succesfully bought:</h1>
        </div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col"></div>


        <div class="col-6">
            <?php
            if (isset($_SESSION['cart'])) {
                include 'sql-statements/database-connectie.php';
                $sql = "INSERT INTO weborder (order_id, user_id) VALUES (?, ?)";
                $statement = mysqli_prepare($connect, $sql);
                mysqli_stmt_bind_param($statement, 'ii', $_GET['order_id'], $_SESSION['id']);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);


                foreach ($_SESSION['cart'] as $StockItemID => $Quantity) {
                    include "sql-statements/shoppingcart/SQL-ShoppingCart.php";
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $StockItemName = $row["StockItemName"];
                        $UnitPrice = $row["RecommendedRetailPrice"];
                        print("<br><div class='row align-items-center'><div class='col'>$StockItemName </div><div class='col text-center'>Amount: $Quantity</div>
<div class='col text-right'><font color=\"green\">€" . number_format($UnitPrice * $Quantity * 1.21, 2, '.', ',') . "</font></div></div><hr>");

                        $totalprices[] = number_format($UnitPrice * $Quantity, 2, '.', '');
                    }
                    $sql = "INSERT INTO weborderline (order_id, stockitemid, quantity) VALUES (?, ?, ?)";
                    $statement = mysqli_prepare($connect, $sql);
                    mysqli_stmt_bind_param($statement, 'iii', $_GET['order_id'], $StockItemID, $Quantity);
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);

                    $sql2 = "UPDATE stockitemholdings SET quantityonhand = quantityonhand - ? WHERE stockitemid = ?";
                    $statement2 = mysqli_prepare($connect, $sql2);
                    mysqli_stmt_bind_param($statement2, 'ii', $Quantity, $StockItemID);
                    mysqli_stmt_execute($statement2);
                    $result2 = mysqli_stmt_get_result($statement2);
                }

                $TotalPriceExl = number_format(array_sum($totalprices), 2, '.', '');
                $TotalPriceInc = number_format($TotalPriceExl * 1.21, 2, '.', '');


            } else {
                print("<br><br><br><br><div class='row h3 text-left align-items-center'><font color='red'>No Items</font></div>");
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
                    <h3>Return to the homepage</h3>
                    <form action="index.php" method="post">
                        <input type="submit" name="submit" value="Homepage"
                               class="btn btn-success btn-lg btn-block">
                    </form>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
    <br>
    <?php
    unset($_SESSION['cart']);
} else { ?>
    <div class="col-10">
    <!-- WEBPAGE CONTENT -->
    <div class="row">
        <div class="col"></div>
        <div class="col-10">
            <br>
            <br>
            <h1 class="text-left"><font color="red"> Payment <?php print($paymentarray['status']); ?></font></h1>
            <br>
            <br>
        </div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col">
        <a href="Checkout.php" class="btn btn-success btn-lg btn-block">Return to Checkout</a>
        </div>
        <div class="col"></div>
    </div>
            <?php
}

include "inc/footer.php";
?>