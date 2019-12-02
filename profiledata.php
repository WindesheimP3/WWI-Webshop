<?php
session_start();
$title = "Profile Page";
include 'inc/header.php';
include 'sql-statements/database-connectie.php';
?>
<!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <?php
    # webpage content
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: profile.php");
        exit;
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Personal Details</title>
        <style type="text/css">
            body {
                font: 14px sans-serif;
                text-align: center;
            }
        </style>
    </head>
    <body>
    <div class="col-12">
        <div class="row">
            <div class="col text-center">
                <h1>Personal Details:</h1>
            </div>
            <div class="row">
                <div class="text-center">
                    <h3>First Name</h3> <input type="text" name="firstname"


            <?php
            include 'inc/footer.php';
            ?>
