<?php
session_start();
include "inc/Checkout/Header.php";
?>
    <div class="col-12">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1 class="text-left">Checkout</h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <?php
                if (isset($_SESSION['cart'])) {
                    include 'sql-statements/database-connectie.php';
                    foreach ($_SESSION['cart'] as $StockItemID => $Quantity) {
                        include "sql-statements/shoppingcart/SQL-ShoppingCart.php";
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $StockItemName = $row["StockItemName"];
                            $UnitPrice = $row["RecommendedRetailPrice"];
                            print("<br><div class='row align-items-center'><div class='col'>$StockItemName </div><div class='col text-center'>Amount: $Quantity</div>
<div class='col text-right'><font color=\"green\">€" . number_format($UnitPrice * $Quantity * 1.21, 2, '.', ',') . "</font></div></div><hr>");

                            $totalprices[] = number_format($UnitPrice * $Quantity, 2, '.', '');
                        }
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
                <div class="container" id="totaalprijs">
                    <div class="row sticky-top">
                        <div class="col">
                            Subtotal (excl): <br>
                            Subtotal (incl): <br>
                            Shipping Cost:<br>
                        </div>
                        <div class="col text-right">
                            €<?php print(number_format($TotalPriceExl, 2)) ?> <br>
                            €<?php print(number_format($TotalPriceInc, 2)) ?><br>
                            <?php if ($TotalPriceInc < 50 and $TotalPriceInc != 0) {
                                print("€3.95");
                            } else {
                                print("<font color=\"green\">Free</font>");
                            } ?>
                            <hr>
                        </div>
                    </div>
                    <div class="row sticky-top">
                        <div class='col h2'>
                            <font color="green"><?php if ($TotalPriceInc != 0) {
                                    print("Total:</div>");
                                } else {
                                    print("Free:</div>");
                                }
                                if ($TotalPriceInc < 50 and $TotalPriceInc != 0) {
                                    print("<div class='col text-right h2'>€" . number_format($TotalPriceInc + 3.95, 2) . "</div>");
                                } else {
                                    print("<div class='col text-right h2'>€" . number_format($TotalPriceInc, 2) . "</div>");
                                } ?></font>
                        </div>
                        <hr>
                        <?php
                        include 'sql-statements/database-connectie.php';

                        $sql1 = "SELECT * FROM account_owner WHERE user_id = ? ";
                        $stmt1 = mysqli_prepare($connect, $sql1);
                        mysqli_stmt_bind_param($stmt1, "i", $_SESSION["id"]);
                        mysqli_stmt_execute($stmt1);
                        $result1 = mysqli_stmt_get_result($stmt1);
                        while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                            $firstname = $row["first_name"];
                            $lastname = $row["last_name"];
                            $street = $row["streetname"];
                            $housenumber = $row["house_number"];
                            $zipcode = $row["zip_code"];
                            $city = $row["city"];
                        }

                        if (isset($_SESSION['loggedin'])) {
                            print("  <h3>Shipment Details</h3>
                    $firstname $lastname <br>
                    $street $housenumber <br>
                    $zipcode $city <br>
                    ");

                        } else {
                            print ("<div class='row sticky-top h2'><div class='col'> Shipment Details</div></div>
                    <div class='row sticky-top'><font color=\"red\"><div class='col'>You are not logged in.</div></font></div>");
                        }
                        ?>


                        <br>
                        <div class="row sticky-top">
                            <div class="col">
                                <?php if (isset($_SESSION['loggedin'])) {
                                    print("
                            <form action='payment.php' method='post'>
                                <input type='hidden' value=$TotalPriceInc name='EUR'>
                                <input type='submit' name='submit' value='Proceed to payment'
                                       class='btn btn-success btn-lg btn-block'>
                            </form> ");
                                } else {
                                    print("
                            <form action=\"payment.php\" method=\"post\">
                                <input type=\"hidden\" value=$TotalPriceInc name=\"EUR\">
                                <input type=\"submit\" name=\"submit\" value=\"Proceed to Login\" class=\"btn btn-success btn-lg btn-block\">
                            </form>");
                                } ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
    <br>
<?php
include "inc/Checkout/footer.php";
?>