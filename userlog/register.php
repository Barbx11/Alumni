<div class="content-wrapper" style="background-color: rgb(139, 60, 64)">
  <!-- Main content -->
  <div class="content">
    <div class="container">

      <form method="post">
      <div class="row" style="padding-top: 10%">
        <div class="logo">
          <div class="row">
            <div class="col-3">

            </div>
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
            <div class="col-3">
              
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <?php
            if(isset($_POST['register']))
            {
              $fname = $_POST ['fname'];
              $std_id =$_POST ['std_id'];
              $mname = $_POST ['mname'];
              $lname = $_POST ['lname'];
              $birth_place = $_POST ['birth_place'];
              $birth_date = $_POST ['birth_date'];
              $citizeship = $_POST ['citizenship'];
              $sex = $_POST ['sex'];
              $religion = $_POST ['religion'];
              $status = $_POST ['status'];
              $email = $_POST ['email'];
              $number = $_POST ['number'];
              $tp_num = $_POST ['tp_num'];
              $street = $_POST ['street'];
              $house_num = $_POST ['house_num'];
              $city = $_POST ['city'];
              $brgy = $_POST ['brgy'];
              $zip_code = $_POST ['zip_code'];
              $province = $_POST ['province'];
              $course = $_POST ['course'];
              $education = $_POST ['education'];
              $year_grad = $_POST ['year_grad'];
              $major = $_POST ['major'];
              $department = $_POST ['department'];
              $company = $_POST ['company'];
              $employ_status = $_POST ['employ_status'];
              $position = $_POST ['position'];
              $industry = $_POST ['industry'];
              $start_date = $_POST ['start_date'];
              $service = $_POST ['service'];
              $password = $_POST ['password'];
              $confirm_pass = $_POST ['confirm_pass'];

              $check_user = mysqli_query($conn, "SELECT * FROM user_acc WHERE stud_id = '$std_id'");
              $result = mysqli_num_rows($check_user);
              if($result <= 0)
              {
                if($password == $confirm_pass)
                {
                  mysqli_query($conn, "INSERT INTO user_acc (`stud_id`,`password`,`email_add`,`confirmation`) VALUES ('$std_id', '$password', '$email', 0)");
                  $user_id = $conn->insert_id;
                  mysqli_query($conn, "INSERT INTO personal_information (`user_id`, `student_id`, `first_name`, `middle_name`, `last_name`, `sex`, `civil_status`, `date_of_birth`, `place_of_birth`, `citizenship`, `religion`, `image`) VALUES ('$user_id', '$std_id', '$fname', '$mname', '$lname', '$sex', '$status', '$birth_date', '$birth_place', '$citizeship', '$religion', 'missing.png')" );
                  if(isset($_POST['company']))
                  {
                    mysqli_query($conn, "INSERT INTO employment__information (`user_id`, `employment_status`, `industry`, `date_started`, `company`, `position`, `years_of_service`) VALUES ('$user_id', '$employ_status', '$industry', '$start_date', '$company', '$position', '$service')");
                  }
                  mysqli_query($conn, "INSERT INTO educational_background (`user_id`, `educational_attainment`, `major`, `department`, `course`, `year_graduated`) VALUES ('$user_id', '$education', '$major', '$department', '$course', '$year_grad')");
                  mysqli_query($conn, "INSERT INTO contact_information (`user_id`, `email_address`, `mobile_phone_number`, `telephone_number`) VALUES ('$user_id', '$email', '$number', '$tp_num')");
                  mysqli_query($conn, "INSERT INTO address_information (`user_id`, `house_number`, `street`, `barangay`, `city`, `province`, `zip_code`) VALUES ('$user_id', '$house_num', '$street', '$brgy', '$city', '$province', '$zip_code')");
                  ?>
                  <div class="panel text-center" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; border-radius: 25px; background-color: #8f2b2f; background-color: rgba(143, 43, 47, 0.7); padding: 10px">
                    <div class="intro" style="color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 500; width: 100%; height: 100%; align-items: center; justify-content: flex-start;">
                      Success! <br> Your account has been created please wait for the admin to verify your account informations.
                    </div>
                  </div>
                  <?php

                }
                else
                {
                  ?>
                  <div class="panel text-center" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; border-radius: 25px; background-color: #8f2b2f; background-color: rgba(143, 43, 47, 0.7); padding: 10px">
                    <div class="intro" style="color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 500; width: 100%; height: 100%; align-items: center; justify-content: flex-start;">
                      Alert! <br> Confirmation password does not match.
                    </div>
                  </div>
                  <?php
                }
              }
              else
              {
                $user_dets = mysqli_fetch_assoc($check_user);
                if($user_dets['confirmation'] == 0)
                {
                  ?>
                  <div class="panel text-center" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; border-radius: 25px; background-color: #8f2b2f; background-color: rgba(143, 43, 47, 0.7); padding: 10px">
                    <div class="intro" style="color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 500; width: 100%; height: 100%; align-items: center; justify-content: flex-start;">
                      You have already created an account and is subjected for verification. <br>Kindly wait for the admin confirmation.
                    </div>
                  </div>
                  <?php
                }
                else
                {
                  ?>
                  <div class="panel text-center" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; border-radius: 25px; background-color: #8f2b2f; background-color: rgba(143, 43, 47, 0.7); padding: 10px">
                    <div class="intro" style="color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 500; width: 100%; height: 100%; align-items: center; justify-content: flex-start;">
                      Alert! <br>The account that you are trying to register already exist. <br> Kindly check your student number or contact the alumni admin for assistance.
                    </div>
                  </div>
                  <?php
                }
              }
            }
          ?> 
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="panel" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; margin-bottom: 3%; border-radius: 50px; background-color: #742f32;">
            <div class="intro" style="padding: 10px 10px 10px 25px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;">
              <span>Personal Information</span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*First Name" id = "fname" name = "fname" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Student ID" id = "student_id" name = "std_id" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Middle Name" id="mname" name = "mname" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Last Name" id="lname" name ="lname" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Place of Birth" id="place_of_birth" name ="birth_place" required/></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Date of Birth" onfocus="this.type = 'date'" onblur="this.type='text'" id="date_of_birth" name ="birth_date" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Citizenship" id="citizenship" name ="citizenship" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Sex" id="sex" name ="sex" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Religion" id="religion" name ="religion" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Civil Status" id="civil_status" name ="status" required/></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="panel" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; margin-bottom: 3%; border-radius: 50px; background-color: #742f32;">
            <div class="intro" style="padding: 10px 10px 10px 25px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;">
              <span>Contact Information</span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="email" placeholder="*E-mail Address" id="email" name ="email" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Mobile Phone Number" id="mobile_num" name ="number" required/></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Telephone Number" id="telephone_num" name ="tp_num" required/></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="panel" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; margin-bottom: 3%; border-radius: 50px; background-color: #742f32;">
            <div class="intro" style="padding: 10px 10px 10px 25px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;">
              <span>Address Information</span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Street" id="street" name ="street" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*House/Building Number" id="house_num" name ="house_num" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*City" id="city" name="city" required/></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Barangay" id="barangay" name ="brgy" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="number" placeholder="*Zip Code" id="zip_code" name ="zip_code" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Province" id="province" name ="province" required/></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="panel" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; margin-bottom: 3%; border-radius: 50px; background-color: #742f32;">
            <div class="intro" style="padding: 10px 10px 10px 25px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;">
              <span>Educational Background</span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Program / Course" id="program/course" name ="course" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Educational Attainment" id="educ" name ="education" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Year Graduated" id="grad" name ="year_grad" required/></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*Specialization / Major" id="major" name ="major" required/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="*College / Department" id="college/dept" name ="department" required/></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="panel" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; margin-bottom: 3%; border-radius: 50px; background-color: #742f32;">
            <div class="intro" style="padding: 10px 10px 10px 25px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;">
              <span>Employment Information (Optional)</span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="Company" id="company" name="company"/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="Employement Status" id="employment_status" name="employ_status"/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="Position" id="position" name="position"/></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="Industry" id="industry" name="industry"/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="Date Started" onfocus="this.type='date'" onblur="this.type='text'" id="date_start" name="start_date"/></div>
            </div>
            <div class="col-12 text-center">
              <div class="student-id-input"><input type="text" placeholder="Year/s of Service" id="year_serviced" name="service"/></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="panel" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; margin-bottom: 3%; border-radius: 50px; background-color: #742f32;">
            <div class="intro" style="padding: 10px 10px 10px 25px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;">
              <span>Create Password</span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type ="password" placeholder="*Password" id="password" name="password" required/></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="row">
            <div class="col-12 text-center">
              <div class="student-id-input"><input type ="password" placeholder="*Confirm Password" id="confirm_pass" name="confirm_pass" required/></div> 
            </div>
          </div>
        </div>
      </div>

      <!-- for image
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="panel" style="display: flex; align-items: center; justify-content: center; margin-top: 3%; margin-bottom: 3%; border-radius: 50px; background-color: #742f32;">
            <div class="intro" style="padding: 10px 10px 10px 25px;color: #ffffff; font-family: Montserrat-Medium, sans-serif; font-size: 20px; font-weight: 600; width: 100%; height: 100%;">
              <span>Upload Your Picture</span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-8 text-center">
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="exampleInputFile" name='file'>
              <label class="custom-file-label new-file" for="exampleInputFile">
                Choose Image
              </label>
            </div>
            <div class="input-group-append">
              <button type="submit" class="input-group-text new-submit" name="uploadimg" style="border-radius: 0px 40px 40px 0px !important;">Upload</button>
            </div>
          </div>
        </div>
      </div>
      -->

      <div class="row" style="padding-top: 20px;">
        <div class="col-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-8 text-center">
          <button class="btn btn-block btn-light hovering3" style="border: 2px solid;border-radius: 20px;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 20px;font-weight: 600;" type="submit" name="register">
            Submit
          </button>
        </div>
      </div>

      <div class="row" style="padding-top: 20px; padding-bottom: 50px">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-center">
          <div class="form-group mb-0">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1" required>
              <label class="custom-control-label" for="exampleCheck1" style="color: white; text-align: center;">By proceeding in this registration, you hereby declare that the information provided in this form is true and correct. 
              Any willful dishonesty may render legal, academic, and / or administrative sanctions to the undersigned and agree that all information provided shall be used to help in improving the services provided by this website. 
              After clicking SUBMIT, your account will be subjected for verification.</label>
            </div>
          </div>
        </div>
      </div>
      

    </form>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>