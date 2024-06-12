<?php
ob_start();
$alertMessage = '';

if (isset($_POST['submit'])) {
  $stud_id = $_POST['user'];
  $new_password = $_POST['new_pass'];
  $confirm_password = $_POST['confirm_pass'];

  if ($new_password == $confirm_password) {
    $check_user = "SELECT * FROM user_acc WHERE stud_id = ?";
    $stmt = $conn->prepare($check_user);
    $stmt->bind_param("s", $stud_id);
    $stmt->execute();
    $prepared = $stmt->get_result();

    if (mysqli_num_rows($prepared) > 0) {
      $update_password = "UPDATE user_acc SET password = ? WHERE stud_id = ?";
      $stmt = $conn->prepare($update_password);
      $stmt->bind_param("ss", $new_password, $stud_id);
      $stmt->execute();

      if ($stmt->affected_rows > 0) {
        $alertMessage = 'Password updated successfully.';
      } else {
        $alertMessage = 'New Password matched Old Password.';
      }
    } else {
      $alertMessage = 'This student ID is not yet verified or does not exist.';
    }
  } else {
    $alertMessage = 'Passwords do not match.';
  }
  $conn->close();
  $stmt->close();
  
}
?>
<div class="content-wrapper" style="background-color: rgb(139, 60, 64); display: flex; align-items: center; justify-content: center; min-height: 100vh;">
  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="col-12">
        <div class="row" style="min-height: 90vh; display: flex; align-items: center; justify-content: center;">
          <div class="col-lg-7 col-md-12 col-sm-12" style="padding-bottom: 20px; background-color: #8b3c40; border-radius: 20px; padding: 20px;">
          <h2 class="text-center text-white mb-4">Reset Your Password</h2>
            <form method="post">
              <div class="row">
                <div class="col-2"></div>
                <div class="col-12">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control negate" placeholder="Student ID" name="user" style="border-radius: 50px 50px 50px 50px" required>
                  </div>
                </div>
                <div class="col-12"></div>
                <div class="col-12">
                  <div class="input-group mb-3">
                    <input type="password" class="form-control negate" placeholder="New Password" name="new_pass" style="border-radius: 50px 50px 50px 50px" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="input-group mb-3">
                    <input type="password" class="form-control negate" placeholder="Confirm Password" name="confirm_pass" style="border-radius: 50px 50px 50px 50px" required>
                  </div>
                  <?php if ($alertMessage != ''): ?>
                    <div class="alert alert-warning" role="alert">
                      <?php echo $alertMessage; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-12"></div>
                <div class="col-12">
                  <button type="submit" class="btn btn-block btn-light hovering" name="submit" style="border-radius: 20px; font-family: 'Montserrat-SemiBold', sans-serif; font-size: 20px; font-weight: 600;">
                    Reset Password
                  </button>
                </div>
                <div class="col-12"></div>
              </div>
            </form>
            <p class="mb-1 text-center forgot">
              <a href="./shell.php?page=login">Back to Login</a>
            </p>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
