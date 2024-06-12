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
$event_id = $_GET['event_id'];
$get_details = mysqli_query($conn, "SELECT * FROM events WHERE id=$event_id");
$details = mysqli_fetch_assoc($get_details);
if(isset($_POST['uploadimg']))
{
  if($details['image'] != 'missing.jpg')
  {
    unlink("../event/".$details['image']);
  }
  $targetDir = "../event/";
  $fileName = $event_id.'_'.basename($_FILES["file"]["name"]);
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
              $insert = $conn->query("UPDATE events SET `image` = '$fileName' WHERE id ='$event_id'");
              if($insert){
                echo $statusMsg = "You have successfully uploaded your profile picture!";
                echo "<script>window.location.href='./adminshell.php?page=events'</script>";
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