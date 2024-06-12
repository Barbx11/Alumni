<?php
ob_start();
?>
<div class="section">
  <div class="col-12">
    <div class="row" style="min-height: 90vh">
      <div class="col-lg-5 col-md-12 col-sm-12 d-none d-lg-flex text-center justify-content-center" style="padding-top: 30vh;background-image: url(./dist/img/diplo.jpeg); background-size: cover; background-repeat: no-repeat"> 
        <div class="logo">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 text-center">
              <div class="logo-img">
                <img src="./dist/img/LOGO.png" alt="LOGO" style="width:100%; height:100%;background-color: white; border-radius: 50%;">
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <div class="row">
                <div class="col-12 text-center" style="color: #ffffff;text-align: left;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 6.5vw;font-weight: 600;width: 100%;height: 100%;line-height: 90%;">
                  ALUMNI PORTAL
                </div>
                <div class="col-12 text-center"  style="color: #ffffff;text-align: left;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 1.2vw;font-weight: 600;opacity: 0.5">
                  PAMANTASAN NG LUNGSOD NG SAN PABLO
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-12 col-sm-12" style="padding-bottom: 20px; background-color: #8b3c40">
        <div class="logo d-lg-none">
          <div class="row">
            <div class="col-4"></div>
            <div class="col-4 col-lg-4 col-md-4 col-sm-4 text-center">
              <div class="logo-img">
                <img src="./dist/img/LOGO.png" alt="LOGO" style="width:100%; height:100%;background-color: white; border-radius: 50%;">
              </div>
            </div>
            <div class="col-4"></div>
            <div class="col-lg-8 col-md-12 col-sm-12">
              <div class="row">
                <div class="col-12 text-center" style="color: #ffffff;text-align: left;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 6.5vw;font-weight: 600;width: 100%;height: 100%;line-height: 90%;">
                  ALUMNI PORTAL
                </div>
                <div class="col-12 text-center"  style="color: #ffffff;text-align: left;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 1.2vw;font-weight: 600;opacity: 0.5">
                  PAMANTASAN NG LUNGSOD NG SAN PABLO
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-1 d-sm-none d-md-none d-lg-block">
            
          </div>
          <div class="col-lg-10 col-md-12 col-sm-12 col-12">
            <div class="panel" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; border-radius: 50px; background-color: #b3393f;">
              <div class="intro" style="padding: 25px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 5vw; font-weight: 600; width: 100%; height: 100%;">
                <span>Welcome home, our dear </span><span style="color: #ff5f66;">alumni.</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-1 d-sm-none d-md-none d-lg-block">
            
          </div>
          <div class="col-lg-10 col-md-12 col-sm-12 col-12">
            <div class="login-logo" style="color: #ffffff;text-align: center;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 1.5vw;font-weight: 600;margin-top: 20px">
              <b>Please login to catch up with what’s going on campus right now.</b>
            </div>
          </div>
        </div>
        <form method="post">
          <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
              <div class="input-group mb-3">
                <input type="text" class="form-control negate" placeholder="ID number" name="user" style="border-radius: 50px 0px 0px 50px" required>
                <div class="input-group-append">
                  <div class="input-group-text" style="border-radius: 0px 50px 50px 0px">
                    <span>@</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-2">
              
            </div>
            <div class="col-2">
              
            </div>
            <div class="col-8">
              <div class="input-group mb-3">
                <input type="password" class="form-control negate" placeholder="Password" name="pass" style="border-radius: 50px 0px 0px 50px" required>
                <div class="input-group-append">
                  <div class="input-group-text" style="border-radius: 0px 50px 50px 0px">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-lg-8 text-center" style="color: #ff5f66;font-weight: 600;margin-bottom: 20px">
              <?php
                if(isset($_POST['submit']))
                {
                  $stud_id = $_POST['user'];
                  $password = $_POST['pass'];

                  $check_user = "SELECT * FROM user_acc WHERE stud_id = ?";
                  $stmt = $conn->prepare($check_user);
                  $stmt->bind_param("s", $stud_id);
                  $stmt->execute();
                  $prepared = $stmt->get_result();

                  if(mysqli_num_rows($prepared) > 0)
                  {
                    $result = $prepared->fetch_assoc();
                    if($result['password'] == $password)
                    {
                      $confirmation = "SELECT * FROM user_acc WHERE stud_id = ? && confirmation = '1'";
                      $stmt = $conn->prepare($confirmation);
                      $stmt->bind_param("s", $stud_id);
                      $stmt->execute();
                      $confirmation_result = $stmt->get_result();
                      if(mysqli_num_rows($confirmation_result) > 0)
                      {
                        $result2 = $confirmation_result->fetch_assoc();
                        $_SESSION['user'] = $result2['username'];
                        $_SESSION['pass'] = $result2['password'];
                        $_SESSION['user_id'] = $result2['id'];
                        $stmt->close();
                        $conn->close();
                        header ("Location: ./user.php");
                        
                      }
                      else
                      {
                        $stmt->close();
                        $conn->close();
                        echo 'Account verification pending.';
                      }
                    }
                    else
                    {
                      $stmt->close();
                      $conn->close();
                      echo 'Wrong password!';
                    }
                    
                  }
                  else
                  {
                    $stmt->close();
                    $conn->close();
                    echo 'This user does not exist.';
                  }
                }
              ?>
            </div>
            <div class="col-2"></div>
            <div class="col-4"></div>
            <!-- /.col -->
            <div class="col-lg-4 col-md-12 col-sm-12">
              <button type="submit" class="btn btn-block btn-light hovering" name="submit" style="border-radius: 20px;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 20px;font-weight: 600;">
                Login
              </button>
            </div>
            <div class="col-4"></div>
            <div class="col-12 text-center" style="color: #ffffff;text-align: left;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 20px;font-weight: 600;margin-top: 10px;margin-bottom: 13px">
              or
            </div>
            <div class="col-4"></div>
            <!-- /.col -->
            <div class="col-lg-4 col-md-12 col-sm-12">
              <a href="./shell.php?page=register" class="btn btn-block btn-light hovering2" style="border-radius: 20px;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 20px;font-weight: 600;">
                Sign Up
              </a>
            </div>
            <div class="col-4"></div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mb-1 text-center forgot">
          <a href="./shell.php?page=forgot">I forgot my password</a>
        </p>
      </div>
    </div>
    

    </div>
  </div> 
</div>