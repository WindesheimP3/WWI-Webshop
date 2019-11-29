<?php
session_start();
unset($_SESSION['cart']);
header("Location: shopping-cart.php");
exit;
