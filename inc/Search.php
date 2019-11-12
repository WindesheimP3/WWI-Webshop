<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <title>Webshopnaam</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<p><body>
<form method="post" action="search.php?go"  id="searchform">
    <input type="text" name="name">
    <input  type="submit" name="submit" value="Search">
</form>
<?php
if(isset($_POST['submit'])){
    if(isset($_GET['go'])){
        if(preg_match("^/[A-Za-z]+/", $_POST['name'])){
            $name=$_POST['name'];
            $db=mysqli_connect ("servername",  "<username>", "<password>") or exit ('I cannot connect  to the database because: ' . mysqli_error());
            }
    } else{
        print ("<p>Please enter a search query</p>");
    }
}
?>
</body>
</html>
</p>
