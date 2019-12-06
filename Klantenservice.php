<!-- inladen header -->
<?php
session_start();
$title = "Klantenservice";
include 'inc/header.php';
?>
<!-- Deze div-class zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <!-- inladen sidebar -->
    <?php
    include 'inc/sidebar.php'
    ?>
    <div class="col-10">
        <!-- WEBPAGE CONTENT -->
        <h1 class="text-center">Customer Service </h1>
        <br>
        <h2 class="text-center"> You can reach out to us on these platforms:</h2>

    </div>
</div>
<!-- inladen footer -->
<?php
include 'inc/footer.php';
?>
