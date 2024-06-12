<?php
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM user_acc WHERE id = '$id'");
echo '<meta http-equiv="refresh" content="0;url=./adminshell.php?page=users">';
?>