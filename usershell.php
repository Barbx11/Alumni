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
  <link rel="stylesheet" href="./dist/css/userprof.css" />
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
          <?php 
          if(isset($_GET['page']) && $_GET['page'] != 'profile')
          {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="./usershell.php?page=profile" style="color: #ffffff;font-size: 20px;font-weight: 600;font-family: 'Montserrat-SemiBold', sans-serif;">
                My Profile
              </a>
            </li>
            <?php 
          }
          else
          {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="./usershell.php?page=logout" style="color: #ffffff;font-size: 20px;font-weight: 600;font-family: 'Montserrat-SemiBold', sans-serif;">
                Logout <i class="fas fa-arrow-right"></i>
              </a>
            </li>
            <?php
          }
          ?>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    
    <?php
    if($_GET['page']=='events')
    {
      include "./userpage/events.php";
    }
    else if($_GET['page']=='about')
    {
      include "./userpage/about.php";
    }
    else if($_GET['page']=='gallery')
    {
      include "./userpage/gallery.php";
    }
    else if($_GET['page']=='view_announce_auth')
    {
      include "./userpage/view_announce_auth.php";
    }
    else if($_GET['page']=='profile')
    {
      include "./userpage/userprof.php";
    }
    else if($_GET['page']=='edit')
    {
      include "./userpage/edit.php";
    }
    else if($_GET['page']=='logout')
    {
      include "./userpage/logout.php";
    }
    ?> 
        
    <!-- /.content-wrapper -->

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