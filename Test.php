<?php
$title = "banaan";
include 'inc/header.php';
include 'inc/Database-Connectie.php';
?>
<!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
<div class="row">
    <?php
    // Sidebar
    include 'inc/sidebar.php'
    ?>
    <div class="col-8">
        <!-- WEBPAGE CONTENT -->
        <h1 class="text-left">Heading 1</h1>
        <p class="text-left">Some text.</p>
        <h2 class="text-left">Heading 2</h2>
        <p class="text-left">Some more text.</p>
    </div>
</div>

<?php
include 'inc/footer.php';
?>
