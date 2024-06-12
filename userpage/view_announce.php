<div class="content-wrapper" style="background-color: rgb(139, 60, 64)">
  <!-- Main content -->
  <div class="content">
    <div class="container" style="padding-top: 3%;padding-bottom: 30px;">
      <?php
      $announce_id = $_GET['view_id'];
      $announce_details = mysqli_query($conn,"SELECT * FROM announcement WHERE id='$announce_id'");
      $detail_list = mysqli_fetch_assoc($announce_details);
      ?>
      <div class="card">
        <div class="card-body" style="background-color: #742f32;">
          <div class="post">
            <div class="user-block">
              <div class="col-12 text-left" style="color: #ffffff;font-family: 'Montserrat-SemiBold', sans-serif;font-size: 40px;font-weight: 600;width: 100%;height: 100%;line-height: 100%;">
                <?php echo $detail_list['title']; ?>
              </div>
              <span class="description" style="margin-left: 7px;font-weight: bold;color: white">Posted on - <?php echo $detail_list['date']; ?></span>
            </div>

            <div class="row mb-3 text-center" style="margin: 0px">
              <div class="col-sm-12 col-md-12 col-lg-6" style="padding:5px">
                <img class="img-fluid" style="border-radius: 10px;height: 100%" src="./announcement/<?php echo $detail_list['image']; ?>" alt="Photo">
              </div>

              <div class="col-sm-12 col-md-12 col-lg-6" style="padding:5px">
                <p style="color: white; text-align: justify; background-color:#8f2b2f; border-radius: 10px; height: 100%; padding: 20px"><?php echo $detail_list['content']; ?></p>
              </div>
            </div>
            
            <!-- comments -->
            <div class="row mb-3 text-center" style="margin: 0px; max-height: 300px; overflow-y: auto; height: 100%">
              <div class="col-12">
                
                  <?php
                  $get_comments = mysqli_query($conn, "SELECT * FROM comments WHERE announce_id = '$announce_id' ORDER BY `real_time` DESC");
                  if(mysqli_num_rows($get_comments) > 0)
                  {
                    ?>
                    <div class="direct-chat-messages" style="display: flex; flex-direction: column-reverse;">
                      <?php
                      while($comment_details = mysqli_fetch_assoc($get_comments))
                      {
                        $sender_id = $comment_details['user_id'];
                        $sender = mysqli_query($conn, "SELECT * FROM personal_information WHERE `user_id` = $sender_id");
                        $sender_data = mysqli_fetch_assoc($sender);
                        ?>
                        <div class="direct-chat-msg">
                          <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left text-white"><?php echo ucwords($sender_data['first_name'])." ".ucwords($sender_data['last_name']); ?> </span>
                          </div>

                          <img class="direct-chat-img" src="./userpics/<?php echo $sender_data['image']; ?>" alt="Message User Image">

                          <div class="direct-chat-text text-left" style="width: fit-content; min-width: 30%;">
                            <?php echo $comment_details['comment_content']; ?>
                            <br><span class="direct-chat-timestamp"><?php echo $comment_details['time']; ?></span>
                          </div>
                        </div>
                        <?php
                      }
                      ?>
                    </div>
                  <?php
                  }
                  else
                  {
                    ?>
                    <div class="col-12" style="opacity: 0.5">
                      <i class="fas fa-comments text-white" style="font-size: 50px"></i>
                    </div>
                    <div class="col-12 text-white" style="opacity: 0.5">
                      No Comments
                    </div>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>