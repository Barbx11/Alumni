<?php
$announce = mysqli_query($conn, "SELECT * FROM announcement");
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 text-white">
        <h1>Announcement</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-white top-right-link" href="./adminshell.php?page=new_announce"><b>New Announcement</b></a></li>
        </ol>
      </div>
    </div>
  </div>
</section>
<div class="row">
  <?php
  if(mysqli_num_rows($announce) > 0)
  {
    while($details = mysqli_fetch_assoc($announce))
    {
    ?>
    
    <div class="col-12" style="padding:5px 20px 5px 20px; background-color: #8F2B2F;margin-bottom: 10px;border-radius: 10px">
      <div class="row">
        <div class="col-3" style="height: 150px;
          background-image: url(../announcement/<?php echo $details['image']; ?>);
          background-size: cover; background-repeat: no-repeat; background-position: center">
        </div>
        <div class="col-9" style="height: 150px;overflow-y: auto">
          <h3 class="text-white" style="padding: 0px">
            <b><?php echo $details['title']; ?></b>
            <a class="top-right-link" href="./adminshell.php?page=announce_edit&announce_id=<?php echo $details['id']; ?>" style="color:white; font-size: 18px"><i class="fas fa-pen fa-sm"></i>Edit</a>
            <a class="top-right-link" href="./adminshell.php?page=announce_delete&announce_id=<?php echo $details['id']; ?>" style="color:red; font-size: 18px"><i class="fas fa-trash fa-sm"></i>Delete</a>
          </h3>
          <div class="text-white">
            <b><?php echo $details['date']; ?></b>
          </div>
          <div class="text-white">
            <?php echo $details['content']; ?>
          </div>
        </div>
      </div>
    </div>
    
    <?php
    }
  }
  ?>
</div>