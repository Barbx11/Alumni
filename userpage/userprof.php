<div class="content-wrapper" style="background-color: rgb(139, 60, 64)">
  <!-- Main content -->
  <div class="content">
    <div class="container">
      <?php
      $user_id = $_SESSION['user_id'];

      $get_info = "SELECT personal_information.*,educational_background.*,contact_information.*,address_information.*,employment__information.*
      FROM personal_information 
      JOIN educational_background ON personal_information.user_id = educational_background.user_id
      JOIN contact_information ON personal_information.user_id = contact_information.user_id
      JOIN address_information ON personal_information.user_id = address_information.user_id
      JOIN employment__information ON personal_information.user_id = employment__information.user_id
      WHERE personal_information.user_id = ?";
      $stmt = $conn->prepare($get_info);
      $stmt->bind_param("s", $user_id);
      $stmt->execute();
      $detail_list = $stmt->get_result()->fetch_assoc();
      $stmt->close();
      $conn->close();
      ?>
      <div class="row" style="padding-top: 30px">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12" style="padding-bottom: 30px;">
          <div class="panel" style="display: flex; align-items: center; justify-content: center; border-radius: 50px; background-color: #742f32;height: 100%">
            <div class="intro text-center" style="padding: 20px 20px 20px 20px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;">
              <div class="text-left" style="font-size:18px">
                <a class="edit-info" href="./usershell.php?page=edit" style="color: white">
                  <i class="fas fa-pen-nib"></i> Edit informations
                </a>
              </div>
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" style="width: 50%" src="./userpics/<?php echo $detail_list['image']; ?>" alt="User profile picture">
              </div>
              <div style="border-bottom: 2px solid white; padding:10px">
                <?php echo ucwords($detail_list['last_name']).', '.ucwords($detail_list['first_name']).' '.strtoupper(substr($detail_list['middle_name'], 0, 1)).'.'; ?>
              </div>
              <div class="text-left" style="margin-left: 40px;">

                <div class="row">
                  <div class="col-12" style="padding-top: 20px;font-size: 18px">
                    <i class="fas fa-graduation-cap fa-lg"></i> Education
                  </div>
                  <div class="col-12" style="font-size: 16px">
                    <ul>
                      <li>
                        <?php echo 'Graduate of '.$detail_list['course'].' Major in '.$detail_list['major'].' last '.$detail_list['year_graduated']?>
                      </li>
                    </ul>
                  </div>
                  <div class="col-12" style="padding-top: 5px;font-size: 18px">
                    <i class="fas fa-envelope"></i> Email
                  </div>
                  <div class="col-12" style="font-size: 16px; word-break: break-all">
                    <ul>
                      <li>
                        <?php echo $detail_list['email_address']?>
                      </li>
                    </ul>
                  </div>
                  <div class="col-12" style="padding-top: 5px;font-size: 18px">
                    <i class="fas fa-phone"></i> Phone Number
                  </div>
                  <div class="col-12" style="font-size: 16px">
                    <ul>
                      <li>
                        <?php echo $detail_list['mobile_phone_number']?>
                      </li>
                      <li>
                        <?php echo $detail_list['telephone_number']?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-12" style="padding-bottom: 30px;">
          <div class="panel" style="display: flex; align-items: center; justify-content: center; border-radius: 50px; background-color: #742f32;height: 100%">
            <div class="intro" style="padding: 20px 20px 20px 20px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;min-height: 680px">
              <div style="border-bottom: 2px solid white">
                Personal Information
              </div>
              <div class="text-left">

                <div class="row">
                  <div class="col-12" style="padding-top: 5px;font-size: 18px">
                    <i class="fas fa-user-graduate fa-lg"></i> User Information
                  </div>
                  <div class="col-12" style="font-size: 16px">
                    <ul>
                      <li>
                        Gender - <?php echo $detail_list['sex']; ?>
                      </li>
                      <li>
                        Civil Status - <?php echo $detail_list['civil_status']; ?>
                      </li>
                      <li>
                        Religion - <?php echo $detail_list['religion']; ?>
                      </li>
                      <li>
                        Citizenship - <?php echo $detail_list['citizenship']; ?>
                      </li>
                      <li>
                        Birthdate - <?php echo $detail_list['date_of_birth']; ?>
                      </li>
                      <li>
                        Place of birth - <?php echo $detail_list['place_of_birth']; ?>
                      </li>
                    </ul>
                  </div>
                  <div class="col-12" style="padding-top: 5px;font-size: 18px">
                    <i class="fas fa-map"></i> Location
                  </div>
                  <div class="col-12" style="font-size: 16px; word-break: break-word">
                    <ul>
                      <li>
                        <?php echo $detail_list['house_number'].' '.$detail_list['street'].' '.$detail_list['barangay'].' '.$detail_list['city'].', '.$detail_list['province']?>
                      </li>
                    </ul>
                  </div>
                  <div class="col-12 text-center" style="padding-top: 5px;font-size: 18px">
                    Latest Employment Record
                  </div>
                  <div class="col-12">
                    <img class="img-fluid" src="./dist/img/building.jpeg" alt="Photo" style="border-radius: 10px; opacity: 0.5">
                    <div class="col-12 position-absolute text-center" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
                      <ul class="list-unstyled">
                        <li>
                          Employment Status - <?php echo $detail_list['employment_status'];?>
                        </li>
                        <li>
                          Company - <?php echo $detail_list['company'];?>
                        </li>
                        <li>
                          Industry - <?php echo $detail_list['industry'];?>
                        </li>
                        <li>
                          Position - <?php echo $detail_list['position'];?>
                        </li>
                        <li>
                          Date Started - <?php echo $detail_list['date_started'];?>
                        </li>
                        <li>
                          Years of Service- <?php echo $detail_list['years_of_service'];?>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>