<?php
session_start();
$title="Over ons";
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
        <h1 class="text-center">About us </h1> <br>
        <h5 class="text-center">We are a group consisting of 5 people, working together to make this site accessible and functional for all to use. <br>
        We are 5 students at the University of Applied Sciences Windesheim in Zwolle, the Netherlands, <br>
            and this is our project for the subject called 'kbs' (distinctive professional situations).
        <br> <br> <br> <br> <br>
        </h5>
            <h4 class="text-center">
        Credits: <br>
            </h4>
        <h6 class="text-center">
        Duncan van Steenes - projectleader <br>
        Colin Stulp <br>
        Noah Kleijberg <br>
        Sander Kunst<br>
        Steven Buter</h6>
    </div>
</div>

<?php
include 'inc/footer.php';
?>
