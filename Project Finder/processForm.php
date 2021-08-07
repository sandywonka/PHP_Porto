<?php
  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "", "multi_login");
  if (isset($_POST['save_profile'])) {
    $bio = stripslashes($_POST['bio']);
    $live = stripslashes($_POST['live']);
    $working = stripslashes($_POST['working']);
    $education = stripslashes($_POST['education']);
    $dari = stripslashes($_POST['dari']);
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    $target_dir = "userimg/";
    $target_file = $target_dir . basename($profileImageName);
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO users_info SET profile_image='$profileImageName', bio='$bio', live='$live', working='$working', education='$education', dari='$dari'";
        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  }
?>
