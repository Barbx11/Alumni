<?php
$announce_id = $_GET['announce_id'];
$get_details = mysqli_query($conn, "SELECT * FROM announcement WHERE id = $announce_id");
$details = mysqli_fetch_assoc($get_details);
if($details['image'] != 'missing.jpg')
{
  unlink("../announcement/".$details['image']);
}
mysqli_query($conn, "DELETE FROM announcement WHERE id = $announce_id");
echo "<script>window.location.href='./adminshell.php?page=announce_list'</script>";
?>
