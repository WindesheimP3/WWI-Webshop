<?php
session_start();
include "inc/Checkout/header.php";
/*
 * How to prepare an iDEAL payment with the Mollie API.
 */
if (isset($_SESSION['loggedin'])) {
    try {
        /*
         * Initialize the Mollie API library with your API key.
         *
         * See: https://www.mollie.com/dashboard/developers/api-keys
         */
        require "mollie/initialize.php";
        /*
         * Generate a unique order id for this example. It is important to include this unique attribute
         * in the redirectUrl (below) so a proper return page can be shown to the customer.
         */
        $orderId = time();
        if (isset($_POST['EUR'])) {
            /*
             * Determine the url parts to these example files.
             */
            $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
            $hostname = $_SERVER['HTTP_HOST'];
            $path = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);
            $value = $_POST['EUR'];
            /*
             * Payment parameters:
             *   amount        Amount in EUROs. This example creates a € 27.50 payment.
             *   method        Payment method "ideal".
             *   description   Description of the payment.
             *   redirectUrl   Redirect location. The customer will be redirected there after the payment.
             *   webhookUrl    Webhook location, used to report when the payment changes state.
             *   metadata      Custom metadata that is stored with the payment.
             *   issuer        The customer's bank. If empty the customer can select it later.
             */
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => $value // You must send the correct number of decimals, thus we enforce the use of strings
                ],
                "method" => \Mollie\Api\Types\PaymentMethod::IDEAL,
                "description" => "Order #{$orderId}",
                "redirectUrl" => "http://localhost/wwi-webshop/BuySucces.php?order_id={$orderId}",
                "webhookUrl" => "https://webhook.site",
                "metadata" => [
                    "order_id" => $orderId,
                ],
                "issuer" => !empty($_POST["issuer"]) ? $_POST["issuer"] : null
            ]);
            /*
             * In this example we store the order with its payment status in a database.
             */

            /*
             * Send the customer off to complete the payment.
             * This request should always be a GET, thus we enforce 303 http response code
             */
            header("Location: " . $payment->getCheckoutUrl(), true, 303);
        } else {
            print ("<a href='shopping-cart.php'> Something went wrong, please return</a>");
        }
    } catch (\Mollie\Api\Exceptions\ApiException $e) {
        echo "API call failed: " . htmlspecialchars($e->getMessage());
    }
} else {


    // VANAF HIER NAAR BENEDEN IS VOOR ALS ER NIET IS INGELOGD



    include 'sql-statements/database-connectie.php';

// Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";

// Processing form data when form is submitted
    if (isset($_POST['username'])) {

        // Check if username is empty
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter username.";
        } else {
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate credentials
        if (empty($username_err) && empty($password_err)) {
            // Prepare a select statement
            $sql = "SELECT id, username, password FROM users WHERE username = ?";

            if ($stmt = mysqli_prepare($connect, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, so start a new session
                                session_start();

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;

                                // Redirect user to welcome page
                                header("location: Checkout.php");
                            } else {
                                // Display an error message if password is not valid
                                $password_err = "The password you entered was not valid.";
                            }
                        }
                    } else {
                        // Display an error message if username doesn't exist
                        $username_err = "No account found with that username.";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
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
    <body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
    </body>

    <?php
}
include "inc/Checkout/footer.php";
