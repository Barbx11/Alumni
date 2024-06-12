<?php
    $user_id = $_SESSION['user_id'];
    
    // Fetch user information securely using prepared statements
    $stmt = $conn->prepare("SELECT personal_information.*, educational_background.*, contact_information.*, address_information.*, employment__information.*
                            FROM personal_information 
                            JOIN educational_background ON personal_information.user_id = educational_background.user_id
                            JOIN contact_information ON personal_information.user_id = contact_information.user_id
                            JOIN address_information ON personal_information.user_id = address_information.user_id
                            JOIN employment__information ON personal_information.user_id = employment__information.user_id
                            WHERE personal_information.user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $old_info = $stmt->get_result();
    $old_detail_list = $old_info->fetch_assoc();
    $stmt->close();

?>
<div class="content-wrapper" style="background-color: rgb(139, 60, 64)">
    <!-- Main content -->
    <div class="content">
        <div class="container"> 
            <form method="post" action="">
                <div class="row" style="padding-top: 30px">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12" style="padding-bottom: 30px;">
                        <div class="panel" style="display: flex; align-items: center; justify-content: center; border-radius: 50px; background-color: #742f32;height: 100%">
                            <div class="intro text-center" style="padding: 20px 20px 20px 20px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" style="width: 50%" src="./userpics/<?php echo $old_detail_list['image']; ?>" alt="User profile picture">
                                </div>
                                <div style="border-bottom: 2px solid white; padding:10px">
                                    <label for="inputLastName">Last Name: </label>
                                    <input type="text" id="inputLastName" name="lname" value="<?php echo ucwords($old_detail_list['last_name']); ?>"><br>
                                    <label for="inputFirstName">First Name: </label>
                                    <input type="text" id="inputFirstName" name="fname" value="<?php echo ucwords($old_detail_list['first_name']); ?>"><br>
                                    <label for="inputMiddleName">Middle Name: </label>
                                    <input type="text" id="inputMiddleName" name="mname" value="<?php echo strtoupper(substr($old_detail_list['middle_name'], 0, 1)); ?>">
                                </div>
                                <div class="text-left" style="margin-left: 40px;">
                                    <div class="row">
                                        <div class="col-12" style="padding-top: 20px;font-size: 18px">
                                            <i class="fas fa-graduation-cap fa-lg"></i> Education
                                        </div>
                                        <div class="col-12" style="font-size: 16px">
                                            <ul>
                                                <li>
                                                    College - <input type="text" name="course" value="<?php echo $old_detail_list['course']; ?>"><br>
                                                </li>
                                                <li>
                                                    Major - <input type="text" name="major" value="<?php echo $old_detail_list['major']; ?>"><br>
                                                </li>
                                                <li>
                                                    Year Graduated -  <input type="text" name="year_graduated" value="<?php echo $old_detail_list['year_graduated']; ?>">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12" style="padding-top: 5px;font-size: 18px">
                                            <i class="fas fa-envelope"></i> Email
                                        </div>
                                        <div class="col-12" style="font-size: 16px; word-break: break-all">
                                            <ul>
                                                <li>
                                                    <input type="email" name="email_address" value="<?php echo $old_detail_list['email_address']; ?>">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12" style="padding-top: 5px;font-size: 18px">
                                            <i class="fas fa-phone"></i> Phone Number
                                        </div>
                                        <div class="col-12" style="font-size: 16px">
                                            <ul>
                                                <li>
                                                    <label for="mnum">Mobile Number - </label>
                                                    <input type="text" name="mobile_phone_number" id="mnum" value="<?php echo $old_detail_list['mobile_phone_number']; ?>">
                                                </li>
                                                <li> 
                                                    <label for="tele">Telephone Number - </label>
                                                    <input type="text" name="telephone_number" id="tele" value="<?php echo $old_detail_list['telephone_number']; ?>">
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
                                                    Gender - <input type="text" name="sex" value="<?php echo $old_detail_list['sex']; ?>">
                                                </li>
                                                <li>
                                                    Civil Status - <input type="text" name="civil_status" value="<?php echo $old_detail_list['civil_status']; ?>">
                                                </li>
                                                <li>
                                                    Religion - <input type="text" name="religion" value="<?php echo $old_detail_list['religion']; ?>">
                                                </li>
                                                <li>
                                                    Citizenship - <input type="text" name="citizenship" value="<?php echo $old_detail_list['citizenship']; ?>">
                                                </li>
                                                <li>
                                                    Birthdate - <input type="date" name="date_of_birth" value="<?php echo $old_detail_list['date_of_birth']; ?>">
                                                </li>
                                                <li>
                                                    Place of Birth - <input type="text" name="place_of_birth" value="<?php echo $old_detail_list['place_of_birth']; ?>">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12" style="padding-top: 5px;font-size: 18px">
                                            <i class="fas fa-map"></i> Location
                                        </div>
                                        <div class="col-12" style="font-size: 16px; word-break: break-word">
                                            <ul>
                                                <li>
                                                    House Number: <input type="text" name="house_number" value="<?php echo $old_detail_list['house_number']; ?>">
                                                </li>
                                                <li>
                                                    Street: <input type="text" name="street" value="<?php echo $old_detail_list['street']; ?>">
                                                </li>
                                                <li>
                                                    Barangay: <input type="text" name="barangay" value="<?php echo $old_detail_list['barangay']; ?>">
                                                </li>
                                                <li>
                                                    City: <input type="text" name="city" value="<?php echo $old_detail_list['city']; ?>">
                                                </li>
                                                <li>
                                                    Province: <input type="text" name="province" value="<?php echo $old_detail_list['province']; ?>">
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
                                                Employment Status - <input type="text" name="employment_status" value="<?php echo $old_detail_list['employment_status'];?>">
                                              </li>
                                              <li>
                                                Company - <input type="text" name="company" value="<?php echo $old_detail_list['company'];?>">
                                              </li>
                                              <li>
                                                Industry - <input type="text" name="industry" value="<?php echo $old_detail_list['industry'];?>">
                                              </li>
                                              <li>
                                                Position - <input type="text" name="position" value="<?php echo $old_detail_list['position'];?>">
                                              </li>
                                              <li>
                                                Date Started - <input type="text" name="date_started" value="<?php echo $old_detail_list['date_started'];?>">
                                              </li>
                                              <li>
                                                Years of Service- <input type="text" name="years_of_service" value="<?php echo $old_detail_list['years_of_service'];?>">
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
                <div class="text-center" style="padding-bottom: 30px;">
                  <button type="submit" class="btn btn-danger" name="update">Update Information</button>
                </div>
            </form>
            <?php
            if (isset($_POST['update'])) {
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
                $sex = $_POST['sex'];
                $civil_status = $_POST['civil_status'];
                $religion = $_POST['religion'];
                $citizenship = $_POST['citizenship'];
                $date_of_birth = $_POST['date_of_birth'];
                $place_of_birth = $_POST['place_of_birth'];
                $house_number = $_POST['house_number'];
                $street = $_POST['street'];
                $barangay = $_POST['barangay'];
                $city = $_POST['city'];
                $province = $_POST['province'];
                $email_address = $_POST['email_address'];
                $mobile_phone_number = $_POST['mobile_phone_number'];
                $telephone_number = $_POST['telephone_number'];
                $course = $_POST['course'];
                $major = $_POST['major'];
                $year_graduated = $_POST['year_graduated'];
                $employment_status = $_POST['employment_status'];
                $company = $_POST['company'];
                $industry = $_POST['industry'];
                $position = $_POST['position'];
                $date_started = $_POST['date_started'];
                $years_of_service = $_POST['years_of_service'];

                
                $stmt = $conn->prepare("UPDATE personal_information 
                                        JOIN educational_background ON personal_information.user_id = educational_background.user_id
                                        JOIN contact_information ON personal_information.user_id = contact_information.user_id
                                        JOIN address_information ON personal_information.user_id = address_information.user_id
                                        JOIN employment__information ON personal_information.user_id = employment__information.user_id
                                        SET first_name = ?, middle_name = ?, last_name = ?, sex = ?, civil_status = ?, religion = ?, citizenship = ?, date_of_birth = ?, place_of_birth = ?, 
                                            house_number = ?, street = ?, barangay = ?, city = ?, province = ?, email_address = ?, mobile_phone_number = ?, telephone_number = ?, 
                                            course = ?, major = ?, year_graduated = ?, employment_status = ?, industry = ?, date_started = ?, company = ?, position = ?, years_of_service = ?
                                        WHERE personal_information.user_id = ?");
                $stmt->bind_param("ssssssssssssssssssssssssssi", $fname, $mname, $lname, $sex, $civil_status, $religion, $citizenship, $date_of_birth, $place_of_birth, 
                                  $house_number, $street, $barangay, $city, $province, $email_address, $mobile_phone_number, $telephone_number, $course, $major, $year_graduated, $employment_status, $industry, $date_started, $company,$position,$years_of_service, $user_id);
                if ($stmt->execute()) {
                    echo '<script>
                        alert("Information updated successfully.");
                    </script>';
                } else {
                    echo '<script>alert("Error updating information.");</script>';
                }
                $stmt->close();
            }
            ?>
        </div>
    </div>
</div>
