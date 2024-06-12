<?php
ob_start();
require_once('./vendor/autoload.php');
include './connect/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PLSP Alumni Portal</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="./dist/css/carousel1.css" />
</head>

<style>
/* width */
::-webkit-scrollbar {
  height: 5px;
  width: 3px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #747373; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
  cursor: pointer;
}
</style>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-navy" style = "background-color: #8f2b2f;border-color: #8f2b2f;min-height: 90px;">
        
        <button class="navbar-toggler order-1" style="border-width: 0px" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-2" id="navbarCollapse">
          <!-- Left navbar links -->
          <?php
          include "usertopnav.php";
          ?>

          <!-- SEARCH FORM -->
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="./usershell.php?page=profile" style="color: #ffffff;font-size: 20px;font-weight: 600;font-family: 'Montserrat-SemiBold', sans-serif;">
              My Profile
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: #8b3c40; background-image: url(./dist/img/gradpic_harapwalking-removebg.png);background-size: contain;background-repeat: no-repeat;background-position: 100%;border-bottom: 3px solid white"> 
      <!-- Main content -->
      <div class="content">
        <div class="container"  style="padding-top: 10px">

          <div class="section">
            <div class="row" style="margin-top: 10%">
              <div class="logo">
                <div class="row">
                  <div class="col-lg-2 col-md-12 col-sm-12 text-center">
                    <div class="logo-img">
                      <img src="./dist/img/LOGO.png" alt="LOGO" style="width:100%; height:100%;background-color: white; border-radius: 50%; max-width: 150px; max-height: 150px">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="row">
                      <div class="col-12 text-center" style="color: #ffffff;text-align: left;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 86px;font-weight: 600;width: 100%;height: 100%;line-height: 65px;">
                        ALUMNI PORTAL
                      </div>
                      <div class="col-12 text-center"  style="color: #ffffff;text-align: left;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 15px;font-weight: 600;opacity: 0.5">
                        PAMANTASAN NG LUNGSOD NG SAN PABLO
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5" style="padding-bottom: 30px">
                <div class="panel" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; margin-left:-2.4%; border-radius: 25px; background-color: #8f2b2f; background-color: rgba(143, 43, 47, 0.7)">
                  <div class="intro" style="color: #ffffff; margin-left: 2%; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 500; width: 100%; height: 100%; display: flex; align-items: center; justify-content: flex-start;">
                    Step into a world of nostalgia, camaraderie, and endless opportunities as
                    you return to our alma mater’s embrace.
                    <br />
                    <br />
                    Whether you graduated recently or years ago, the bonds we shared as part
                    of the Pamantasan ng Lunsod ng San Pablo family will always remain
                    unbreakable.
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    
    <?php
    $announcements = mysqli_query($conn, "SELECT * FROM announcement ORDER BY real_date ASC");
    if(mysqli_num_rows($announcements) > 0)
    {
    ?>
    <div class="col-12 text-left" style="font-size: 20px;font-weight: 600;font-family: 'Montserrat-Medium', sans-serif;color: #f4f4f4;padding: 10px 10px 10px 40px; background-color: #742f32;border-bottom: 3px solid white">
      Announcements
    </div>
    
    <div class="content" style="background-color: #8b3c40;border-bottom: 3px solid white;padding-bottom: 10px;min-height: 500px !important">
      <div class="container"  style="padding-top: 35px;overflow-x: auto">
        <!-- /.content-wrapper -->
        <div class="row" style="flex-wrap: nowrap">

          <?php
          if(mysqli_num_rows($announcements) == 1)
          {
            ?>
            <div class="col-lg-4 d-lg-block d-md-none d-sm-none d-none"></div>
            <?php
            while($announcements_list = mysqli_fetch_assoc($announcements))
            {
            ?>
              <div class="col-lg-4 col-md-12 col-sm-12 col-12" style="min-height: 600px; padding: 0px 10px 0px 10px">
                <a href="./usershell.php?page=view_announce_auth&view_id=<?php echo $announcements_list['id']; ?>" style="color: #6c757d">
                  <div style="background-image: url(./announcement/<?php echo $announcements_list['image']?>);background-size: 100%;background-position: center;background-repeat: no-repeat; max-width: 100%; height:30%; border-radius: 5px 5px 0px 0px"></div>
                  <div class="col-12">
                    <div class="col-12" style="background-color: white; margin-top: -60px;height: 425px; border-radius: 0px 0px 5px 5px; padding-top: 5px">
                      <h3 class="profile-username text-center" style="color: white;font-weight: 600; background-color: #8b3c40; border-radius: 5px"><?php echo $announcements_list['title']; ?></h3>
                      <p class="text-muted text-center"><?php echo $announcements_list['date']; ?></p>
                      <div style="overflow-y: auto; height: 300px; text-align: justify;">
                        
                        <?php
                          echo $announcements_list['content'];
                        ?>
                        
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php
            }
          }
          else if(mysqli_num_rows($announcements) == 2)
          {
            ?>
            <div class="col-lg-2 d-lg-block d-md-none d-sm-none d-none"></div>
            <?php
            while($announcements_list = mysqli_fetch_assoc($announcements))
            {
            ?>
              
              <div class="col-lg-4 col-md-12 col-sm-12 col-12" style="min-height: 600px; padding: 0px 10px 0px 10px">
                <a href="./usershell.php?page=view_announce_auth&view_id=<?php echo $announcements_list['id']; ?>" style="color: #6c757d">
                  <div style="background-image: url(./announcement/<?php echo $announcements_list['image']?>);background-size: 100%;background-position: center;background-repeat: no-repeat; max-width: 100%; height:30%; border-radius: 5px 5px 0px 0px"></div>
                  <div class="col-12">
                    <div class="col-12" style="background-color: white; margin-top: -60px;height: 425px; border-radius: 0px 0px 5px 5px; padding-top: 5px">
                      <h3 class="profile-username text-center" style="color: white;font-weight: 600; background-color: #8b3c40; border-radius: 5px"><?php echo $announcements_list['title']; ?></h3>
                      <p class="text-muted text-center"><?php echo $announcements_list['date']; ?></p>
                      <div style="overflow-y: auto; height: 300px; text-align: justify;">
                        
                        <?php
                          echo $announcements_list['content'];
                        ?>
                        
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php
            }
          }
          else if(mysqli_num_rows($announcements) >= 3)
          {
            while($announcements_list = mysqli_fetch_assoc($announcements))
            {
            ?>
              <div class="col-lg-4 col-md-12 col-sm-12 col-12" style="min-height: 600px; padding: 0px 10px 0px 10px">
                <a href="./usershell.php?page=view_announce_auth&view_id=<?php echo $announcements_list['id']; ?>" style="color: #6c757d">
                  <div style="background-image: url(./announcement/<?php echo $announcements_list['image']?>);background-size: 100%;background-position: center;background-repeat: no-repeat; max-width: 100%; height:30%; border-radius: 5px 5px 0px 0px"></div>
                  <div class="col-12">
                    <div class="col-12" style="background-color: white; margin-top: -60px;height: 425px; border-radius: 0px 0px 5px 5px; padding-top: 5px">
                      <h3 class="profile-username text-center" style="color: white;font-weight: 600; background-color: #8b3c40; border-radius: 5px"><?php echo $announcements_list['title']; ?></h3>
                      <p class="text-muted text-center"><?php echo $announcements_list['date']; ?></p>
                      <div style="overflow-y: auto; height: 300px; text-align: justify;">
                        
                        <?php
                          echo $announcements_list['content'];
                        ?>
                        
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php
            }
          }
          ?>
        </div>
      </div>
      
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <?php
    }
    ?>
    
    <?php
      $events = mysqli_query($conn, "SELECT * FROM events");
      if(mysqli_num_rows($events) > 0)
    {
    ?>
    <div class="col-12 text-left" style="height: 53px;font-size: 20px;font-weight: 600;font-family: 'Montserrat-Medium', sans-serif;color: #f4f4f4;padding: 10px 40px 10px 40px; background-color: #742f32;border-bottom: 3px solid white">
      <div class="float-left">
        Happening Now
      </div>
      <a href="./shell.php?page=events" class="float-right" style="color: white">
        See All <i class="fas fa-arrow-right"></i>
      </a>
    </div>
    <!-- Main Content -->
    <div class="col-12" style="background-color: #928888">
      <div class="container" style="padding-top: 10px;max-width: 1200px;">
        <div class="caro-container">
          <div class="slider-wrapper">
            <button id="prev-slide" class="slide-button">
              <i class="fas fa-chevron-left"></i>
            </button>
            <ul class="image-list">
          <?php
            if(mysqli_num_rows($events) == 1)
            {
              while($events_list = mysqli_fetch_assoc($events))
              {
            ?>    
            <a href="./usershell.php?page=view_event_auth&view_event=<?php echo $events_list['id']; ?>">
              <img class="image-item" src="./event/<?php echo $events_list['image']?>" alt="img-1" style="border-radius: 10px"/>
            </a>
            <?php
            }
          }
            else if(mysqli_num_rows($events) == 2)
            {
            ?>
            <?php
            while($events_list = mysqli_fetch_assoc($events))
            {
            ?>
            <a href="./usershell.php?page=view_event_auth&view_event=<?php echo $events_list['id']; ?>">
              <img class="image-item" src="./event/<?php echo $events_list['image']?>" alt="img-2" style="border-radius: 10px"/>
            </a>
            <?php
            }
          }
            else if(mysqli_num_rows($events) >= 3)
            { 
            ?>
            <?php
            while($events_list = mysqli_fetch_assoc($events))
            {
            ?>
            <a href="./usershell.php?page=view_event_auth&view_event=<?php echo $events_list['id']; ?>">
              <img class="image-item" src="./event/<?php echo $events_list['image']?>" alt="img-3" style="border-radius: 10px"/>
            </a>
            <?php
            }
          }
          else
          {
            echo "No Events";
          }
          ?>
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
    <?php
    }
    ?>

    
    <footer class="main-footer" style="background-color: #8f2b2f;height: 83px;border: none;padding: 18px 50px 12px 40px;">
      <!-- BOTTOM FOOTER LEFT SIDE -->
      <div class="logo">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-8">
            <div class="row">
              <div class="col-12 text-center">
                <div class="logo-img float-left">
                  <img src="./dist/img/LOGO.png" alt="LOGO" style="width:100%; height:100%;background-color: white; border-radius: 50%; min-width: 50px; min-height: 50px; max-width: 50px; max-height: 50px">
                </div>
                <div class="float-left" style="color: #ffffff;text-align: left;font-family: 'Montserrat-SemiBold', sans-serif;font-weight: 600;height: 100%;line-height: 20px;display: inline-block">
                  <div style="font-size: 28px">ALUMNI</div>
                  <div style="font-size: 16px">ASSOCIATION</div>
                  <div style="font-size: 5px; opacity: 0.5; line-height: 10px">PAMANTASAN NG LUNGSOD NG SAN PABLO</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-4 disappear">
            <div class="text-right" style="font-size: 8px;font-weight: 600;color: #ffffff; line-height: 10px; padding-top: 12px">
              <div style="margin-right: 8px">2024 PAMANTASAN NG</div>
              <div>LUNGSOD NG SAN PABLO</div>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>
<!-- ./wrapper -->
</body>

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="./plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.js"></script>
<script>
const initSlider = () => {
    const imageList = document.querySelector(".slider-wrapper .image-list");
    const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
    const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
    
    // Handle scrollbar thumb drag
    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;
        const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
        
        // Update thumb position on mouse move
        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;

            // Ensure the scrollbar thumb stays within bounds
            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
            
            scrollbarThumb.style.left = `${boundedPosition}px`;
            imageList.scrollLeft = scrollPosition;
        }

        // Remove event listeners on mouse up
        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        }

        // Add event listeners for drag interaction
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });

    // Slide images according to the slide button clicks
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

     // Show or hide slide buttons based on scroll position
    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
    }

    // Update scrollbar thumb position based on image scroll
    const updateScrollThumbPosition = () => {
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`;
    }

    // Call these two functions when image list scrolls
    imageList.addEventListener("scroll", () => {
        updateScrollThumbPosition();
        handleSlideButtons();
    });
}

window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);
</script>
</html>