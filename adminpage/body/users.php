<div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card-body p-0">
    <table class="table table-striped projects">
      <thead>
        <tr class="text-center">
          <th style="width: 7%; color: white">
            Student ID
          </th>
          <th style="width: 20%; color: white">
            Name
          </th>
          <th style="width: 30%; color: white">
            Email
          </th>
          <th style="width: 20%; color: white">
          Status
          </th>
        </tr>
      </thead>
      <tbody>
      <?php
      $users = mysqli_query($conn,"SELECT * FROM user_acc INNER JOIN personal_information ON user_acc.id = personal_information.user_id WHERE confirmation = '0'");
      if(mysqli_num_rows($users) > 0)
      {
        while($user_list = mysqli_fetch_assoc($users))
        {
          ?>
          <tr class="text-center" style = "color: white">
          <td>
            <?php echo $user_list['stud_id'] ?>
          </td>
          <td style = "color: white">
            <?php echo $user_list['first_name']." ".$user_list['middle_name']." ".$user_list['last_name'] ?>
          </td>
          <td style = "color: white">
            <?php echo $user_list['email_add'] ?>
          </td>
          <td class="project-actions text-right">
            <!--<a class="btn btn-primary btn-sm" href="./adminshell.php?page=view_user&id=<?php echo $user_list['user_id']?>">
              <i class="fas fa-eye">
              </i>
              View
            </a>-->
            <a class="btn btn-success btn-sm" href="./adminshell.php?page=verify_user&id=<?php echo $user_list['user_id']?>">
              <i class="fas fa-check">
              </i>
              Verify
            </a>
            <a class="btn btn-danger btn-sm" href="./adminshell.php?page=deny_user&id=<?php echo $user_list['user_id']?>">
              <i class="fas fa-times">
              </i>
              Deny
            </a>
          </td>
      </tr>
          <?php
        }
      }
      ?>
    </tbody>
  </table>
</div>