<?php
include 'functions.php';
  $conn = mysqli_connect("localhost", "root", "", "multi_login");
  $results = mysqli_query($conn, "SELECT * FROM users_info");
  $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="script.js"></script>
  <title>Image Preview and Upload</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4" style="margin-top: 30px;">
        <a href="form.php" class="btn btn-success">New profile</a>
        <br>
        <br>
        <table class="table table-bordered">
          <thead>
            <th>Image</th>
            <th>Bio</th>
            <th>Live at</th>
            <th>Working at</th>
            <th>Education</th>
            <th>From</th>

          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
              <tr>
                <td> <img src="<?php echo 'images/' . $user['profile_image'] ?>" width="90" height="90" alt=""> </td>
                <td> <?php echo $user['bio']; ?> </td>
                <td> <?php echo $user['live']; ?> </td>
                <td> <?php echo $user['working']; ?> </td>
                <td> <?php echo $user['education']; ?> </td>
                <td> <?php echo $user['dari']; ?> </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>