<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- pagina schaalt mee met het device waar het op wordt weergeven -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>
        <?php if (isset($title)) {
            print("WWI-Webshop | $title");
        } else {
            print("WWI-Webshop");
        } ?></title>
    <!-- als titel bestaat print WWI-Webshop+ titel van pagina die wordt geladen.
    anders print WWI-Webshop -->
</head>
<body>
<header>
    <nav class="nav justify-content-center">
        <a class="nav-brand col-10 align-center h1" href="index.php">WWI-Webshop</a>
        <a class="nav-link col-1">Verlanglijst</a>
        <a class="nav-link col-1 small">Mijn profiel</a>
        <!-- col-2 is ruimte voor sidebar -->
        <a class="col-2"></a>
        <a class="nav-link col-1" href="index.php">Home</a>
        <a class="nav-link col-1" href="#">Pagina 1</a>
        <a class="nav-link col-1" href="#">Pagina 2</a>
        <a class="nav-link col-1" href="#">Pagina 3</a>
        <a class="nav-link col-1" href="#">Aanbieding</a>
        <!-- col-4 is gebruikt voor extra ruimte voor de search bar -->
        <a class="nav-link col-4" href="#"><?php include "inc/search.php"?></a>
        <a class="nav-link col-1" href="#">Winkelmand</a>
    </nav>
</header>
<div class="container-fluid">