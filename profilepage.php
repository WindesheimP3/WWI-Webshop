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
                <div class="col">
                    <h2>Order details</h2> <br>
                    <h4 class="text-left">Orders</h4>
                    <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc urna,
                        convallis a dictum quis. </p>
                </div>
                <div class="col">
                    <div class="h2">Personal details</div>
                    <br>
                    <div class="h4 text-left">Name</div>
                    <div class="h6 text-left"><?php print ($firstname . " " . $lastname); ?>
                    </div>
                    <br>
                    <div class="h4 text-left">Address</div>
                    <div class="h6 text-left"> <?php print ($street . " " . $housenumber . ", " . $zipcode); ?>
                    </div>
                    <br>
                    <div class="h4 text-left">City</div>
                    <div class="h6 text-left"> <?php print $city; ?>
                    </div>
                    <br>
                    <a class="h5 text left" class="nav-link" href="profiledata.php"> Change your personal details
                        WIP </a>
                    <br>
                    <br>
                    <br>
                    <a href="passwordreset.php" class="btn btn-warning">Reset Your Password</a>
                    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                </div>
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