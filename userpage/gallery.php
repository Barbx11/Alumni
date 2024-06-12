<div class="content-wrapper" style="background-color: rgb(139, 60, 64)">
  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="col-12">
        <div class="container" style="padding-top: 10px;max-width: 950px;">
          <div class="caro-container">
            <div class="slider-wrapper">
              <button id="prev-slide" class="slide-button">
                <i class="fas fa-chevron-left"></i>
              </button>
              <ul class="image-list">
                <img class="image-item" src="./dist/img/gal1.jpeg" alt="img-1" style="border-radius: 10px"/>
                <img class="image-item" src="./dist/img/gal2.jpeg" alt="img-2" style="border-radius: 10px"/>
                <img class="image-item" src="./dist/img/gal3.jpeg" alt="img-3" style="border-radius: 10px"/>
                <img class="image-item" src="./dist/img/gradpic_nowalk.jpeg" alt="img-4" style="border-radius: 10px"/>
                <img class="image-item" src="./dist/img/high5.jpeg" alt="img-5" style="border-radius: 10px"/>
                <img class="image-item" src="./dist/img/gradpic_likod.jpeg" alt="img-6" style="border-radius: 10px"/>
                
              </ul>
              <button id="next-slide" class="slide-button">
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>
            <div class="slider-scrollbar">
              <div class="scrollbar-track">
                <div class="scrollbar-thumb"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="panel" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; border-radius: 50px; background-color: #742f32;">
            <div class="intro" style="padding: 10px 10px 10px 25px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;">
              <span>Building up memories with us</span>
            </div>
          </div>
        </div>
      </div>
      <?php
        if(isset($_POST['filter']))
        {
          $category = $_POST['category'];
          $year = $_POST['year'];
          if($year == "all" && $category != "all")
          {
            $image_list = mysqli_query($conn,"SELECT * FROM gallery_pics WHERE category='$category'");
          }
          else if($category == "all" && $year != "all")
          {
            $image_list = mysqli_query($conn,"SELECT * FROM gallery_pics WHERE year='$year'");
          }
          else if($category != "all" && $year != "all")
          {
            $image_list = mysqli_query($conn,"SELECT * FROM gallery_pics WHERE year='$year' AND category='$category'");
          }
          else
          {
            $image_list = mysqli_query($conn,"SELECT * FROM gallery_pics");
          }
        }
      ?>
      <form method="post">
        <div class="row" style="margin-top: 20px">
          
            <div class="col-lg-3 col-md-1 d-sm-none d-md-block d-lg-block"></div>
            
            <div class="col-lg-2 col-md-3 col-sm-6" style="padding-bottom: 10px">
              <select class="form-control" name="category" style="border-radius: 10px;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 17px;font-weight: 600">
                <option value="all" <?php if(!isset($category) || $category == "all"){echo "selected";}?>>View All</option>
                <option value="BSIS" <?php if(isset($category) && $category == "BSIS"){echo "selected";}?>>BSIS</option>
                <option value="BSIT" <?php if(isset($category) && $category == "BSIT"){echo "selected";}?>>BSIT</option>
              </select>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6" style="padding-bottom: 10px">
                <select class="form-control" name="year" style="border-radius: 10px;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 17px;font-weight: 600;">
                  <option value="all">Select All</option>
                  <?php
                    $years = mysqli_query($conn,"SELECT * FROM batch");
                    {
                      while($year_list = mysqli_fetch_assoc($years))
                      {
                        ?>
                        <option value="<?php echo $year_list['year']; ?>"
                        <?php
                        if(isset($year) && $year == $year_list['year'])
                        {
                          echo "selected";
                        }
                        ?>><?php echo $year_list['year'];?></option>
                        <?php
                      }
                    }
                  ?>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12" style="padding-bottom: 10px">
              <button type="submit" class="btn btn-block btn-light hovering" name="filter" style="border-radius: 10px;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 17px;font-weight: 600;">
                Filter
              </button>
            </div>
            
            <div class="col-3 col-md-1 d-sm-none d-md-block d-lg-block"></div>
          
        </div>
      </form>
      <div class="row">
        <?php
          if(isset($_POST['filter']))
          {
            if(mysqli_num_rows($image_list) > 0)
            {
              while($image_info = mysqli_fetch_assoc($image_list))
              {
                ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill" style="border-radius: 10px">
                    <div class="card-header border-bottom-0" style="position: absolute; color: white;font-size:20px; font-weight: 600;filter: drop-shadow(.05em .05em red)">
                      <?php echo $image_info['title']; ?>
                    </div>
                    <div class="card-body pt-0" style="padding: 0px">
                      <img src="./uploads/<?php echo $image_info['name']; ?>" alt="photo" style="width: 100%;height: 100%; min-height: 260px; border-radius: 10px">
                    </div>
                  </div>
                </div>
                <?php
              }
            }
            else
            {
              ?>
                <div class="col-12 text-center" style="padding-top: 5%">
                  <i class="fas fa-folder-open" style="color: white; font-size:calc(20px + 8vw);"></i>
                  <div class="login-logo" style="color: #ffffff;text-align: center;font-family: 'Montserrat-SemiBold', sans-serif;font-size:calc(15px + 1.5vw);font-weight: 600;margin-top: 20px">
                    <b>No Picture Found</b>
                  </div>
                </div>
              <?php
            }
          }
          else
          {
            $image_list = mysqli_query($conn,"SELECT * FROM gallery_pics");
            if(mysqli_num_rows($image_list) > 0)
            {
              while($image_info = mysqli_fetch_assoc($image_list))
              {
                ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill" style="border-radius: 10px">
                    <div class="card-header border-bottom-0" style="position: absolute; color: white;font-size:20px; font-weight: 600;filter: drop-shadow(.05em .05em red)">
                      <?php echo $image_info['title']; ?>
                    </div>
                    <div class="card-body pt-0" style="padding: 0px">
                      <img src="./uploads/<?php echo $image_info['name']; ?>" alt="photo" style="width: 100%;height: 100%; min-height: 260px; border-radius: 10px">
                    </div>
                  </div>
                </div>
                <?php
              }
            }
            else
            {
              ?>
                <div class="col-12 text-center" style="padding-top: 5%">
                  <i class="fas fa-folder-open" style="color: white; font-size:calc(20px + 8vw);"></i>
                  <div class="login-logo" style="color: #ffffff;text-align: center;font-family: 'Montserrat-SemiBold', sans-serif;font-size:calc(15px + 1.5vw);font-weight: 600;margin-top: 20px">
                    <b>No Picture Found</b>
                  </div>
                </div>
              <?php
            }
          }
        ?>
        
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>