<?php

$firstname = $lastname = $city = "";
$firstname_err = $lastname_err = $city_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["firstname"]))) {
        $firstname_err = "Please enter your first name.";
    } else if (empty(trim($_POST["lastname"]))) {
        $lastname_err = "Please enter your last name.";
    } else if (empty(trim($_POST["city"]))) {
        $city_err = "Please enter your city.";
    } else {
        // Prepare a select statement
        $sql1 = "SELECT user_id FROM account_owner WHERE user_id = ? ";
        $stmt1 = mysqli_prepare($connect, $sql1);
        mysqli_stmt_bind_param($stmt1, "i", $_SESSION['id']);
        mysqli_stmt_execute($stmt1);
        $result1 = mysqli_stmt_get_result($stmt1);

        if (mysqli_num_rows($result1) == 0) {
            $sql2 = "INSERT INTO account_owner (user_id, first_name, last_name, city) VALUES (?, ?, ?, ?)";
            $stmt2 = mysqli_prepare($connect, $sql2);
            $param_firstname = trim($_POST["firstname"]);
            $param_lastname = trim($_POST["lastname"]);
            $param_city = trim($_POST["city"]);
            mysqli_stmt_bind_param($stmt2, "isss", $_SESSION['id'], $param_firstname, $param_lastname, $param_city);

            if (mysqli_stmt_execute($stmt2)) {
                // Redirect to login page
                header("location: profilepage.php");
                mysqli_stmt_close($stmt2);
            } else {
                echo "1.";
            }
        }
    }
}
