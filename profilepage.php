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
        <div class="col">
            <div class="row">
                <a class="col">
                    <h2>Order details</h2> <br>
                    <h4 class="text-left">Orders</h4>
                    <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc urna,
                        convallis a dictum quis. </p>
                </a>
                <a class="col">
                    <div class="h2">Personal details</div>
                    <br>
                    <div class="h4 text-left">Name</div>
                    <div class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc urna,
                        convallis a dictum quis.
                    </div>
                    <br>
                    <div class="h4 text-left">Address</div>
                    <div class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc urna,
                        convallis a dictum quis.
                    </div>
                    <br>
                    <div class="h4 text-left">City</div>
                    <div class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc urna,
                        convallis a dictum quis.
                    </div>
                    <br>
                    <div class="row">
                        <a href="passwordreset.php" class="btn btn-warning">Reset Your Password</a>
                        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                        <br>
                        <br>
                    </div>
                </a>
            </div>


        </div>
    </body>

    <!-- footer -->
<?php
include "sql-statements/database-Sluit.php";
?>
<?php
include 'inc/footer.php';
?>