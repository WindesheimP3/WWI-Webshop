<?php
session_start();
$title = "Werken bij";
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
        <h1 class="text-center">Join us</h1>
        <br><br><br>
        <h3 class="text-center"> -- There are currently no job offers available --</h3>

    </div>
</div>

<?php
include 'inc/footer.php';
?>
