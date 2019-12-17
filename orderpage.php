<?php
session_start();
$title = "Profile Page";
include 'inc/header.php';
include 'sql-statements/database-connectie.php';
?>
    <!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
    <div class="row">
<?php
// Sidebar
include 'inc/sidebar.php';
# webpage content
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: profile.php");
    exit;
}
?>
    <div class="col-10">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1 class="text-left">Order: <?php
                    print($_GET["order"]);
                    ?></h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class='row'>
                    <div class='col-5 h5'>Item name </div> <div class='col-1 h5'> Quantity</div>
                    <div class='text-center col-2 h5'> Price </div> <div class='col-4 h5'> Bought </div></div>
                <p> <?php $sql1 = "SELECT weborder.order_id, weborder.created_at, weborderline.stockitemid, weborderline.quantity FROM weborder JOIN weborderline ON weborder.order_id = weborderline.order_id WHERE weborder.order_id = ?";
                    $stmt1 = mysqli_prepare($connect, $sql1);
                    mysqli_stmt_bind_param($stmt1, "i", $_GET["order"]);
                    mysqli_stmt_execute($stmt1);
                    $result1 = mysqli_stmt_get_result($stmt1);
                    while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                        $createdat = $row["created_at"];
                        $stockitemid = $row["stockitemid"];
                        $quantity = $row["quantity"];

                        $sql2 = "SELECT stockitemname, recommendedretailprice FROM stockitems WHERE stockitemid = ?";
                        $stmt2 = mysqli_prepare($connect, $sql2);
                        mysqli_stmt_bind_param($stmt2, "i", $stockitemid);
                        mysqli_stmt_execute($stmt2);
                        $result2 = mysqli_stmt_get_result($stmt2);
                        while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                            $name = $row2["stockitemname"];
                            $price = number_format($row2["recommendedretailprice"] * 1.21 * $quantity,2,".", '');
                            $totalprices[] = number_format($price, 2, '.', '');
                        }
                        print ("<div class='row'>
                                <div class='col-5'> $name </div> <div class='col-1'> $quantity</div>
                                <div class='text-center col-2'> €$price </div> <div class='col-4'> $createdat </div></div><hr>");

                    }
                    $totalprice = array_sum($totalprices);
                    print("<div class='row'>
                           <div class='h5'>Total price: €" . number_format($totalprice, 2) . "</div></div> ")
                    ?>
                </p>
            </div>
            <div class="col-3">
                <div class="row sticky-top">
                    <a href="profilepage.php" class="btn btn-success btn-lg btn-block">Back to profile</a>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    </div>


<?php
include "sql-statements/database-Sluit.php";
?>
<?php
include 'inc/footer.php';
?>