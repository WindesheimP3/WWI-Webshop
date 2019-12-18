<?php
session_start();
$title = "Profile Page";
include 'inc/header.php';
include 'sql-statements/database-connectie.php';
?>
    <!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
    <div class="row">
        <?php
        include 'inc/sidebar.php';
        # webpage content
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            header("location: profile.php");
            exit;
        }
        // Define variables and initialize with empty values
        $firstname = $lastname = $city = $zipcode = $address = $housenumber = $email = "";
        $firstname_err = $lastname_err = $city_err = $zipcode_err = $address_err = $housenumber_err = $email_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Validate username

            if (empty(trim($_POST["firstname"]))) {
                $firstname_err = "Please enter your first name.";
            } else if (empty(trim($_POST["lastname"]))) {
                $lastname_err = "Please enter your last name.";
            } else if (empty(trim($_POST["city"]))) {
                $city_err = "Please enter your city.";
            } else if (empty(trim($_POST["zipcode"]))) {
                $zipcode_err = "Please enter your zip-code.";
            } else if (empty(trim($_POST["address"]))) {
                $address_err = "Please enter your address.";
            } else if (empty(trim($_POST["housenumber"]))) {
                $housenumber_err = "Please enter your housenumber.";
            } else if ($_POST["housenumber"] <= 0) {
                $housenumber_err = "Please enter a valid housenumber.";
            } else if (empty(trim($_POST["emailaddress"]))) {
                $email_err = "Please enter your email-address.";
            } else {
                // Prepare a select statement
                $sql1 = "SELECT user_id FROM account_owner WHERE user_id = ? ";
                $stmt1 = mysqli_prepare($connect, $sql1);
                mysqli_stmt_bind_param($stmt1, "i", $_SESSION['id']);
                mysqli_stmt_execute($stmt1);
                $result1 = mysqli_stmt_get_result($stmt1);

                if (mysqli_num_rows($result1) == 0) {
                    $sql2 = "INSERT INTO account_owner (user_id, first_name, last_name, city, zip_code, streetname, house_number, email_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt2 = mysqli_prepare($connect, $sql2);
                    $param_firstname = trim($_POST["firstname"]);
                    $param_lastname = trim($_POST["lastname"]);
                    $param_city = trim($_POST["city"]);
                    $param_zipcode = trim($_POST["zipcode"]);
                    $param_address = trim($_POST["address"]);
                    $param_housenumber = trim($_POST["housenumber"]);
                    $param_email = trim($_POST["emailaddress"]);
                    mysqli_stmt_bind_param($stmt2, "isssssss", $_SESSION['id'], $param_firstname, $param_lastname, $param_city, $param_zipcode, $param_address, $param_housenumber, $param_email);


                    if (mysqli_stmt_execute($stmt2)) {
                        // Redirect to login page
                        header("location: profilepage.php");
                        mysqli_stmt_close($stmt2);
                    } else {
                        echo "1.";
                    }

                } else {
                    $sql3 = "Update account_owner SET first_name = ?, last_name = ?, city = ?, zip_code = ?, streetname = ?, house_number = ?, email_address = ? where user_id = ?";
                    $stmt3 = mysqli_prepare($connect, $sql3);
                    $param_lastname = trim($_POST["lastname"]);
                    $param_city = trim($_POST["city"]);
                    $param_zipcode = trim($_POST["zipcode"]);
                    $param_address = trim($_POST["address"]);
                    $param_housenumber = trim($_POST["housenumber"]);
                    $param_email = trim($_POST["emailaddress"]);
                    mysqli_stmt_bind_param($stmt3, "sssssssi", $param_firstname, $param_lastname, $param_city, $param_zipcode, $param_address, $param_housenumber, $param_email, $_SESSION['id']);

                    if (mysqli_stmt_execute($stmt3)) {
                        // Redirect to login page
                        header("location: profilepage.php");
                        mysqli_stmt_close($stmt3);
                    } else {
                        echo "2.";
                    }
                }

            }
        }

        ?>


        <br>
        <head>
            <div class="col">
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
                <div class="row">
                    <div class="col"></div>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="wrapper">
                                    <h2>Personal Details</h2>
                                    <p>Change your personal details here.</p>
                                    <form action="profiledata.php" method="post">
                                        <div class="form-group <?php print (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                                            <label>First name</label>
                                            <input type="text" name="firstname" class="form-control"
                                                   value="<?php print $firstname; ?>">
                                            <span class="help-block"><?php print $firstname_err; ?></span>
                                        </div>
                                        <div class="form-group <?php print (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                                            <label>Last name</label>
                                            <input type="text" name="lastname" class="form-control"
                                                   value="<?php print $lastname; ?>">
                                            <span class="help-block"><?php print $lastname_err; ?></span>
                                        </div>
                                        <div class="form-group <?php print (!empty($city_err)) ? 'has-error' : ''; ?>">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control"
                                                   value="<?php print $city; ?>">
                                            <span class="help-block"><?php print $city_err; ?></span>
                                        </div>
                                        <div class="form-group <?php print (!empty($zipcode_err)) ? 'has-error' : ''; ?>">
                                            <label>Zip-code</label>
                                            <input type="text" name="zipcode" class="form-control"
                                                   value="<?php print $zipcode; ?>">
                                            <span class="help-block"><?php print $zipcode_err; ?></span>
                                        </div>
                                        <div class="form-group <?php print (!empty($address_err)) ? 'has-error' : ''; ?>">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control"
                                                   value="<?php print $address; ?>">
                                            <span class="help-block"><?php print $address_err; ?></span>
                                        </div>
                                        <div class="form-group <?php print (!empty($housenumber_err)) ? 'has-error' : ''; ?>">
                                            <label>Housenumber</label>
                                            <input type="number" name="housenumber" class="form-control"
                                                   value="<?php print $housenumber; ?>">
                                            <span class="help-block"><?php print $housenumber_err; ?></span>
                                        </div>
                                        <div class="form-group <?php print (!empty($email_err)) ? 'has-error' : ''; ?>">
                                            <label>E-mail address</label>
                                            <input type="text" name="emailaddress" class="form-control"
                                                   value="<?php print $email; ?>">
                                            <span class="help-block"><?php print $email_err; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" value="Submit">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row sticky-top">
                                <a href="profilepage.php" class="btn btn-success btn-lg btn-block">Back to profile</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<?php
include 'inc/footer.php';
?>