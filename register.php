<?php
// Include config file
include "inc/Header.php";
?>
<div class="row">
    <?php
    include 'sql-statements/database-connectie.php';
    include "inc/Sidebar.php";
    include "inc/registerdata.php";

    // Define variables and initialize with empty values
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate username
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        } else {
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE username = ?";

            if ($stmt = mysqli_prepare($connect, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = trim($_POST["username"]);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $username_err = "This username is already taken.";
                    } else {
                        $username = trim($_POST["username"]);
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Validate password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have atleast 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }

        // Check input errors before inserting in database
        if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

            // Prepare an insert statement
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

            if ($stmt = mysqli_prepare($connect, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header("location: register.php");
                } else {
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($connect);
    }
    ?>
    <br>
    <head>
        <meta charset="UTF-8">
        <style type="text/css">
            body {
                font: 14px sans-serif;
            }

            .wrapper {
                width: 350px;
                padding: 20px;
            }
        </style>
    </head>
    <div>
        <div class="wrapper">
            <div class="col-5"></div>
            <h2>Sign Up</h2>
            <p>Please fill this form to create an account.</p>
            <form action="register.php" method="post">
                <div class="form-group <?php print (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php print $username; ?>">
                    <span class="help-block"><?php print $username_err; ?></span>
                </div>
                <div class="form-group <?php print (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php print $password; ?>">
                    <span class="help-block"><?php print $password_err; ?></span>
                </div>
                <div class="form-group <?php print (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control"
                           value="<?php print $confirm_password; ?>">
                    <span class="help-block"><?php print $confirm_password_err; ?></span>
                </div>
        </div>
        <div class="col"></div>
        <div class="wrapper">
            <h2>Personal Details</h2>
            <p>Please fill in your personal details to complete your registration</p>
            <div class="form-group <?php print (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                <label>First name</label>
                <input type="text" name="firstname" class="form-control" value="<?php print $firstname; ?>">
                <span class="help-block"><?php print $firstname_err; ?></span>
            </div>
            <div class="form-group <?php print (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                <label>Last name</label>
                <input type="text" name="lastname" class="form-control" value="<?php print $lastname; ?>">
                <span class="help-block"><?php print $lastname_err; ?></span>
            </div>
            <div class="form-group <?php print (!empty($city_err)) ? 'has-error' : ''; ?>">
                <label>City</label>
                <input type="text" name="city" class="form-control" value="<?php print $city; ?>">
                <span class="help-block"><?php print $city_err; ?></span>
            </div>
            <div class="form-group <?php print (!empty($zipcode_err)) ? 'has-error' : ''; ?>">
                <label>Zip-code</label>
                <input type="text" name="zipcode" class="form-control" value="<?php print $zipcode; ?>">
                <span class="help-block"><?php print $zipcode_err; ?></span>
            </div>
            <div class="form-group <?php print (!empty($address_err)) ? 'has-error' : ''; ?>">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php print $address; ?>">
                <span class="help-block"><?php print $address_err; ?></span>
            </div>
            <div class="form-group <?php print (!empty($housenumber_err)) ? 'has-error' : ''; ?>">
                <label>Housenumber</label>
                <input type="number" name="housenumber" class="form-control" value="<?php print $housenumber; ?>">
                <span class="help-block"><?php print $housenumber_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="Profile.php">Login here</a>.</p>
            </form>
        </div>
    </div>


    <?php
    include "inc/Footer.php"
    ?>
</div>
