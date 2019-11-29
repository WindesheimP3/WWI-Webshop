<?php

// Initialize the session
session_start();

unset ($_SESSION['loggedin']);
unset ($_SESSION['id']);
unset ($_SESSION['username']);

// Redirect to login page
header("location: profile.php");
exit;
