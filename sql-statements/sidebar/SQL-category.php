<?php
$sqlc = "SELECT * FROM stockgroups";
$statement = mysqli_prepare($connect, "SELECT * FROM stockgroups");
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
?>