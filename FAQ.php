<?php
session_start();
$title = "FAQ";
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
        <h1 class="text-center">FAQ </h1>
        <br> <h3 class="text-center"> -- There are no questions yet, help us improve, by contacting us at our <a href="klantenservice.php"><font color="#00bfff">customer service</font></a> --</h3>
    </div>
</div>

<?php
include 'inc/footer.php';
?>
