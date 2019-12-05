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
                $sql1 = "SELECT user_id FROM account_owner WHERE user_id = ? ";
                $stmt1 = mysqli_prepare($connect, $sql1);
                mysqli_stmt_bind_param($stmt1, "i", $_SESSION['id']);
                mysqli_stmt_execute($stmt1);
                $result1 = mysqli_stmt_get_result($stmt1);

                if (mysqli_num_rows($result1) == 0) {
                    $sql2 = "INSERT INTO account_owner (user_id, first_name) VALUES (?, ?)";
                    $stmt2 = mysqli_prepare($connect, $sql2);
                    $param_firstname = trim($_POST["firstname"]);
                    mysqli_stmt_bind_param($stmt2, "is", $_SESSION['id'], $param_firstname);

                    if (mysqli_stmt_execute($stmt2)) {
                        // Redirect to login page
                        header("location: profilepage.php");
                        mysqli_stmt_close($stmt2);
                    } else {
                        echo "1.";
                    }

                } else {
                    $sql3 = "Update account_owner SET first_name = ? where user_id = ?";
                    $stmt3 = mysqli_prepare($connect, $sql3);
                    $param_firstname = trim($_POST["firstname"]);
                    mysqli_stmt_bind_param($stmt3, "si", $param_firstname, $_SESSION['id']);

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
            <div class="col"
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
                <h2>Personal Details</h2>
                <p>Please fill in your personal details.</p>
                <form action="profiledata.php" method="post">
                    <div class="form-group <?php print (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                        <label>First name</label>
                        <input type="text" name="firstname" class="form-control" value="<?php print $firstname; ?>">
                        <span class="help-block"><?php print $firstname_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
include 'inc/footer.php';
?>