<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 text-white">
        <h1>Events</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-white top-right-link" href="./adminshell.php?page=new_event"><b>New Events</b></a></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="row">
  <?php
  $get_details = mysqli_query($conn, "SELECT * FROM events");
  if(mysqli_num_rows($get_details) > 0)
  {
    while($details = mysqli_fetch_assoc($get_details))
    {
      ?>
      <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex align-items-stretch flex-column">
        <a href="#">
          <div class="card bg-light d-flex flex-fill" style="border-radius: 10px">
            <div class="card-header border-bottom-0" style="position: absolute; color: white;font-size:20px; font-weight: 600;filter: drop-shadow(.05em .05em red)">
              <?php echo $details['title']; ?><br>
              <?php echo $details['date']; ?>
            </div>
            <div class="card-body pt-0" style="padding: 0px">
              <img src="../event/<?php echo $details['image']; ?>" alt="photo" style="width: 100%;height: 100%; min-height: 300px; border-radius: 10px">
            </div>
          </div> 
        </a>         
      </div>
      <?php
    }
  }
  ?>
</div> 