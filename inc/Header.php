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
        } ?></title>
</head>
<body id="Achtergrond">
<header id="Headerbalk">
    <nav class="nav justify-content-center">
        <a class="nav-brand col-3 align-center h1" href="index.php">WWI-Webshop</a>
        <a class="col-7"></a>
        <a class="nav-link col-1" href="#">Wishlist</a>
        <a class="nav-link col-1 small" href="#">My profile</a>
        <a class="col-2"></a>
        <a class="nav-link col-1" href="index.php">Home</a>
        <a class="nav-link col-1" href="#">Page 1</a>
        <a class="nav-link col-1" href="#">Page 2</a>
        <a class="nav-link col-1" href="#">Page 3</a>
        <a class="nav-link col-1" href="#">Deals</a>
        <a class="nav-link col-4" href="#"><?php include "inc/search.php"?></a>
        <a class="nav-link col-1" href="#">Shoppingcart</a>
    </nav>
</header>
<div class="container-fluid">