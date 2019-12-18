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
        include 'inc/paging-zoek/paging-start.php';

        # webpage content
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            header("location: profile.php");
            exit;
        }

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
            $email = $row["email_address"];
        }


        ?>
        <head>
            <meta charset="UTF-8">
            <title>Welcome</title>
            <style type="text/css">
                body {
                    font: 14px sans-serif;
                    text-align: center;
                }
            </style>
        </head>
        <body>
        <div class="col-10">
            <div class="row">
                <div class="col text-center">
                    <h1>Welcome <b><?php print htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <h2>Order details</h2> <br>
                    <h3 class="text-left">Orders</h3>
                    <div class="row">
                        <div class="col h5">Total price</div>
                        <div class='col h5'>Order number:</div>
                        <div class='col h5'>Bought:</div>
                    </div>

                    <?php
                    $sql3 = "SELECT * FROM weborder WHERE user_id = ? ORDER BY created_at DESC LIMIT 10";
                    $stmt3 = mysqli_prepare($connect, $sql3);
                    mysqli_stmt_bind_param($stmt3, "i", $_SESSION["id"]);
                    mysqli_stmt_execute($stmt3);
                    $result3 = mysqli_stmt_get_result($stmt3);
                    while ($row1 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                        $orderid = $row1["order_id"];
                        $createdat = $row1["created_at"];
                        $totalprices = array();

                        $sql4 = "SELECT weborderline.stockitemid, weborderline.quantity FROM weborder JOIN weborderline ON weborder.order_id = weborderline.order_id WHERE weborder.order_id = ?";
                        $stmt4 = mysqli_prepare($connect, $sql4);
                        mysqli_stmt_bind_param($stmt4, "i", $orderid);
                        mysqli_stmt_execute($stmt4);
                        $result4 = mysqli_stmt_get_result($stmt4);
                        while ($row3 = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
                            $stockitemid = $row3["stockitemid"];
                            $quantity = $row3["quantity"];

                            $sql2 = "SELECT recommendedretailprice FROM stockitems WHERE stockitemid = ?";
                            $stmt2 = mysqli_prepare($connect, $sql2);
                            mysqli_stmt_bind_param($stmt2, "i", $stockitemid);
                            mysqli_stmt_execute($stmt2);
                            $result2 = mysqli_stmt_get_result($stmt2);
                            while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                                $price = number_format($row2["recommendedretailprice"] * 1.21 * $quantity, 2, ".", '');
                                $totalprices[] = number_format($price, 2, '.', '');
                            }
                        }
                        $totalprice = array_sum($totalprices);

                        print("<a href='orderpage.php?order=$orderid'> <div class='row'>
                                    <div class='col'>
                                    €" . number_format($totalprice, 2) . "
                                       </div>
                                    <div class='col'>
                                      $orderid
                                      </div>
                                       <div class='col'>
                                      $createdat 
                                      </div>
                                      </div>
                                      <hr> </a> 
                            <br><br>"

                        );
                    }

                    ?>

                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col">
                            <div class="h2 text-left">Personal details</div>
                            <br>
                            <div class="h4 text-left">Name</div>
                            <div class="h6 text-left"><?php print ($firstname . " " . $lastname); ?>
                            </div>
                            <br>
                            <div class="h4 text-left">Address</div>
                            <div class="h6 text-left"> <?php print ("$street $housenumber <br> $zipcode $city"); ?>
                            </div>
                            <br>
                            <div class="h4 text-left">E-mail address</div>
                            <div class="h6 text-left"> <?php print $email; ?>
                            </div>
                            <br>
                        </div>
                    </div>
                            <a class="h5 text-left" class="nav-link" href="profiledata.php"> Change your personal
                                details</a>
                            <br>
                            <br>
                            <br>
                            <a href="passwordreset.php" class="btn btn-warning">Reset Your Password</a>
                            <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>


                </div>

            </div>
        </div>
    </div>
<?php
include "sql-statements/database-Sluit.php";
?>
<?php
include 'inc/footer.php';
?>