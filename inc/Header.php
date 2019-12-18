<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Styling.css">
    <title><?php if (isset($title)) {
            print("WWI-Webshop | $title");
        } else {
            print("webshop");
        } ?>
    </title>
</head>
<body id="Achtergrond">
<header id="Headerbalk">
    <nav class="nav">
        <a href="Index.php" class="nav-item col-7">
            <img src="img\Logo.png" alt="WideWorldImporters" id="Logo">
        </a>
        <div class="col">
            <div class="nav-link col"><?php include "inc/search.php" ?></div>
        </div>
        <div class="col">
            <a class="nav-link col" href="shopping-cart.php">
                <img id="Winkelmand" src="img/Winkelmand.png">
                Shopping Cart
            </a>
        </div>
        <div class="col">
            <a class="nav-link col" href="Profile.php">
                <img id="Account" src="img/Account.jpg">
                <?php if (isset($_SESSION['loggedin'])){
                    $username = $_SESSION['username'];
                    print ("<p class=\"text-center\">$username</p>");
                } else {
                    print ('<p class="text-center">Log-in/register &nbsp</p>');
                };
                ?>
            </a>
        </div>
    </nav>
</header>
<div class="container-fluid">
</div>
</body>