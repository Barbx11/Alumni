<?php
$announce_id = $_GET['announce_id'];
$old = mysqli_query($conn,"SELECT * FROM announcement WHERE id=$announce_id");
$old_details = mysqli_fetch_assoc($old);
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 text-white">
        <h1>Edit Announcement</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-white top-right-link" href="./adminshell.php?page=edit_image&announce_id=<?php echo $announce_id ?>" ><b>Edit Image</b></a></li>
          <li class="breadcrumb-item"><a class="text-white top-right-link" href="./adminshell.php?page=announce_list" ><b>Back</b></a></li>
        </ol>
      </div>
    </div>
  </div>
</section>
<div class="col-sm-12 col-md-12 col-lg-12">
  <form method="post">
    <div class="card-body">
      <div class="form-group">
        <label for="inputName">Announcement Title</label>
        <input type="text" id="inputName" name="title" class="form-control" value="<?php echo $old_details['title']; ?>" required>
      </div>
      <div class="form-group">
        <label for="inputDescription">Content</label>
        <textarea id="inputDescription" name="content" class="form-control" rows="4" required><?php echo $old_details['content']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="inputProjectLeader">Announcement Date</label>
        <input type="date" id="inputProjectLeader" name="date" class="form-control" required>
      </div>
      <div class="row no-print">
        <div class="col-12">
          <button type="submit" name="new" class="btn btn-secondary float-right" style = "background-color: #8F2B2F">
          Update
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
<?php
if(isset($_POST['new']))
{
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = $_POST['date'];
  $hold_date = date_create($date);
  $show_date = date_format($hold_date, "F d, Y");
  $newdate = date_create($date);
  $real_date = date_format($newdate, "Y-m-d");
  mysqli_query($conn, "UPDATE announcement SET `title`='$title', `content`='$content', `date`='$show_date', `real_date`='$real_date' WHERE id = '$announce_id'");
  echo "
    <script>
        setTimeout(function(){
            document.getElementById('toast-container').style.display = 'none';
        }, 4000);
    </script>";
  echo("<meta http-equiv='refresh' content='1'>");
}
if(isset($_POST['new']))
{
?>
  <div id="toast-container" class="toast-top-right">
    <div class="toast toast-success" aria-live="polite">
      <div class="toast-message">Announcement Updated Successfully</div>
    </div>
  </div>
  <?php
}
?>
