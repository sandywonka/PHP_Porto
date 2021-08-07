<?php 
include('functions.php');

if (!isGuest()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: index.php');
}


if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Image Preview and Upload PHP</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
  <script src="script.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
        <a href="home.php">Back to Home</a>
        <p>You need to relogin after change.</p>
        <form action="form.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Update profile</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Profile Image</label>
          </div>
          <div class="form-group">
            <label>Live at</label>
            <textarea name="live" placeholder="<?php  if (isset($_SESSION['user'])) : ?>
                        <?php 
                        echo $_SESSION['user']['live'];?>
                        <?php endif ?>" class="form-control"></textarea>
            <label>Company</label>
            <textarea name="working" placeholder="<?php  if (isset($_SESSION['user'])) : ?>
                        <?php 
                        echo $_SESSION['user']['working'];?>
                        <?php endif ?>" class="form-control"></textarea>
            <label>Education</label>
            <textarea name="education" placeholder="<?php  if (isset($_SESSION['user'])) : ?>
                        <?php 
                        echo $_SESSION['user']['education'];?>
                        <?php endif ?>" class="form-control"></textarea>
            <label>From</label>
            <textarea name="dari" placeholder="<?php  if (isset($_SESSION['user'])) : ?>
                        <?php 
                        echo $_SESSION['user']['dari'];?>
                        <?php endif ?>" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="save_profile" href="home.php" class="btn btn-primary btn-block">Save User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<script src="scripts.js"></script>