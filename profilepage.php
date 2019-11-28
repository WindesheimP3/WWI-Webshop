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
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: profile.php");
    exit;
    }
    ?>

    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <style type="text/css">
            body{ font: 14px sans-serif; text-align: center; }
        </style>
    </head>
    <body>
    <div class="page-header">
        <h1>Hi, <b><?php print htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <div class="row">
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    </div>
    </body>

<!-- footer -->
<?php
include "sql-statements/database-Sluit.php";
?>
<?php
include 'inc/footer.php';
?>