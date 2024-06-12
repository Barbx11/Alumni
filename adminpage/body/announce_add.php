
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 text-white">
        <h1>Announcement</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
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
      <input type="text" id="inputName" name="title" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="inputDescription">Content</label>
      <textarea id="inputDescription" name="content" class="form-control" rows="4" required></textarea>
    </div>
    <div class="form-group">
      <label for="inputProjectLeader">Announcement Date</label>
      <input type="date" id="inputProjectLeader" name="date" class="form-control" required>
    </div>
    <div class="row no-print">
      <div class="col-12">
        <button type="submit" name="new" class="btn btn-secondary float-right" style = "background-color: #8F2B2F"> 
        Add Photo
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
  mysqli_query($conn, "INSERT INTO announcement (`title`, `content`, `date`, `real_date`, `image`) VALUES ('$title', '$content', '$show_date', '$real_date', 'missing.webp')");
  $last_id = $conn->insert_id;
  echo '<script type="text/javascript">';
  echo 'window.location.href="./adminshell.php?page=add_image&announce_id='.$last_id.'";';
  echo '</script>';
}
if(isset($_POST['new']))
{
?>
  <div id="toast-container" class="toast-top-right">
    <div class="toast toast-success" aria-live="polite">
      <div class="toast-message">Event successfully added</div>
    </div>
  </div>
  <?php
}
?>