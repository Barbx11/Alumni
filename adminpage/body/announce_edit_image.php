<?php
$announce_id = $_GET['announce_id'];
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 text-white">
        <h1>Edit Announcement Image</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-white top-right-link" href="./adminshell.php?page=announce_edit&announce_id=<?php echo $announce_id?>" ><b>Back</b></a></li>
        </ol>
      </div>
    </div>
  </div>
</section>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputFile" class="text-white">Upload Announcement Cover Photo</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile" name='file'>
            <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
        </div>
        <div class="input-group-append">
            <button type="submit" class="input-group-text" name="uploadimg">Upload</button>
        </div>
    </div>
  </div>
</form>

<?php
$get_details = mysqli_query($conn, "SELECT * FROM announcement WHERE id=$announce_id");
$details = mysqli_fetch_assoc($get_details);
if(isset($_POST['uploadimg']))
{
  if($details['image'] != 'missing.jpg')
  {
    unlink("../announcement/".$details['image']);
  }
  $targetDir = "../announcement/";
  $fileName = $announce_id.'_'.basename($_FILES["file"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  if(isset($_POST["uploadimg"]) && !empty($_FILES["file"]["name"]))
  {
      // Allow certain file formats
      $allowTypes = array('webp');
      if(in_array($fileType, $allowTypes))
      {
          // Upload file to server
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
          {
              // Insert image file name into database
              $insert = $conn->query("UPDATE announcement SET image = '$fileName' WHERE id ='$announce_id'");
              if($insert){
                ?>
                <div id="toast-container" class="toast-top-right">
                  <div class="toast toast-success" aria-live="polite">
                    <div class="toast-message">Announcement Image Edited Successfully</div>
                  </div>
                </div>
                <?php
                echo "
                <script>
                    setTimeout(function(){
                        document.getElementById('toast-container').style.display = 'none';
                    }, 4000);
                </script>";
              }
              else
              {
                echo $statusMsg = "File upload failed, please try again.";
              } 
          }
          else
          {
            echo $statusMsg = "Sorry, there was an error uploading your file.";
          }
      }
      else
      {
        echo $statusMsg = 'Sorry, only WEBP files are allowed to upload.';
      }
  }
  else
  {
    echo $statusMsg = 'Please select a file to upload.';
  }
}
?>