<?php
session_start();
$title = "Profile Page";
include 'inc/header.php';
include 'sql-statements/database-connectie.php';
?>
    <!-- Zorgt er voor dat de sidebar en webcontent in 1 rij staat -->
    <div class="row">
<?php
# webpage content
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: profile.php");
    exit;
}

// Define variables and initialize with empty values
$firstname = "";
$firstname_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Validate username

    if (empty(trim($_POST["firstname"]))) {
        $firstname_err = "Please enter your first name.";
    } else {
        // Prepare a select statement
        $sql = "SELECT first_name FROM account_owner WHERE first_name = ?";

        if ($stmt = mysqli_prepare($connect, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_firstname);

            // Set parameters
            $param_firstname = trim($_POST["firstname"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);
                $firstname = trim($_POST["firstname"]);
            } else {
                echo "oopsiedoopsie";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


// Check input errors before inserting in database
    if (empty($firstname_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO account_owner (first_name) VALUES (?)";

        if ($stmt = mysqli_prepare($connect, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_firstname);

            // Set parameters
            $param_firstname = $firstname;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: profilepage.php");
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


    <head>
        <meta charset="UTF-8">
        <title>Personal Details</title>
        <style type="text/css">
            body {
                font: 14px sans-serif;
                text-align: center;
            }
        </style>
    </head>
    <body>
<div class="col-12">
    <div class="row">
        <div class="col text-center">
            <h1>Personal Details:</h1>
        </div>
    </div>
    <div class="col-4"></div>
    <div class="col">
        <div class="row">
            <div class="col text-center">
                <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php print (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" value="<?php print $firstname; ?>">
                        <span class="help-block"><?php print $firstname_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php
include 'inc/footer.php';
?>