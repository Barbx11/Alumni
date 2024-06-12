<?php
$id = $_GET['id'];

mysqli_query($conn, "UPDATE user_acc SET `confirmation` = 1 WHERE id = '$id'");
echo '<meta http-equiv="refresh" content="0;url=./adminshell.php?page=users">';
?>